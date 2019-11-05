<?php

/*
   ____  __      __    ___  _  _  ___    __   ____     ___  __  __  ___
  (  _ \(  )    /__\  / __)( )/ )/ __)  /__\ (_  _)   / __)(  \/  )/ __)
   ) _ < )(__  /(__)\( (__  )  (( (__  /(__)\  )(    ( (__  )    ( \__ \
  (____/(____)(__)(__)\___)(_)\_)\___)(__)(__)(__)    \___)(_/\/\_)(___/

   @author          Black Cat Development
   @copyright       2019 Black Cat Development
   @link            http://blackcat-cms.org
   @license         http://www.gnu.org/licenses/gpl.html
   @category        CAT_Module
   @package         external_content

*/

namespace CAT\Addon\external_content\Manager;

if (!class_exists('youtube', false))
{
    final class youtube extends \CAT\Base implements \CAT\Addon\external_content\IManager
    {
        private static $tablename = 'mod_external_content_youtube';

        /**
         * get data for current section
         **/
        public function getdata(array $section) : array
        {
            $this->checkTable($section['section_id']);
            $result = self::db()->query(
                'SELECT * FROM `:prefix:'.self::$tablename.'` WHERE `section_id`=?',
                array($section['section_id'])
            );
            $data = $result->fetch();

            // replace link placeholder in info text
            if(is_array($data)) {
                if(isset($data['link'])) {
                    $data['info'] = self::tpl()->get(
                        self::tpl()->fromString($data['info']),
                        array('link'=>$data['link'])
                    );
                }
                if(isset($data['src'])) {
                    $url = parse_url($data['src']);
                    if(isset($url['host'])) {
                        if(!isset($url['scheme'])) {
                            $url['scheme'] = 'http';
                        }
                        $host = $url['host'].'/';
                        // add source to csp
                        \CAT\Helper\Assets::addCSPRule('frame-src',$host);
                    }
                    if(!\CAT\Backend::isBackend()) {
                        $flags = array(
                            'autoplay'       => 0,
                            'fs'             => 0,
                            'iv_load_policy' => 3,
                            'showinfo'       => 0,
                            'rel'            => 0,
                            'cc_load_policy' => 0,
                            'start'          => 0,
                            'end'            => 0,
                        );
                        if(isset($data['autoplay']) && $data['autoplay']=='1') {
                            $flags['autoplay'] = 1;
                        }
                        if(isset($data['fullscreen']) && $data['fullscreen']=='1') {
                            $flags['fs'] = 1;
                        }
                        $data['framesrc'] = $data['src'] . '?' . http_build_query($flags);
                    }
                }
                if(isset($data['autoplay']) && $data['autoplay']=='y') {
                    $data['autoplay'] = 1;
                }
            }

            return is_array($data) ? $data : array();
        }

        /**
         * save data
         **/
        public function savedata(array $section, array $data)
        {
            $this->checkTable($section['section_id']);
            // extract the src from iframe if the user inserted the full html code
            $html = isset($data['src']) ? html_entity_decode($data['src']) : '';
            if(strlen($html)) {
                $dom = new \DOMDocument;
                libxml_use_internal_errors(true);
                $dom->loadHTML('<div>'.$html.'</div>');
                $parent = $dom->getElementsByTagName('iframe');
                if($parent->length) {
                    $src = $parent->item(0)->getAttribute('src');
                    $data['src'] = $src;
                }
            }
            self::db()->query(
                'UPDATE `:prefix:'.self::$tablename.'` SET ' .
                '`title`=:title, `info`=:info, `src`=:src, '.
                '`width`=:width, `height`=:height, '.
                '`autoplay`=:autoplay, `fullscreen`=:fullscreen, '.
                '`button_text`=:button, `link`=:link '.
                'WHERE `section_id`=:id',
                array(
                    'title'  => $data['title'],
                    'info'   => $data['info'],
                    'src'    => $data['src'],
                    'width'  => $data['width'],
                    'height' => $data['height'],
                    'autoplay' => ($data['autoplay'][0]=='1' ? '1' : '0'),
                    'fullscreen' => ($data['fullscreen'][0]=='1' ? '1' : '0'),
                    'button' => $data['button_text'],
                    'link'   => $data['link'],
                    'id'     => $section['section_id']
                )
            );
        }

        /**
         * check if table exists; create it if necessary
         *
         * @access protected
         * @return void
         **/
        protected function checkTable($section_id)
        {
            if(!self::db()->tableExists(self::$tablename)) {
                self::db()->query(
                    'CREATE TABLE `:prefix:'.self::$tablename.'` ( ' .
                    '`section_id` INT(11) UNSIGNED NOT NULL, ' .
                    "`title` TINYTEXT NULL DEFAULT NULL, " .
                    "`info` TEXT NULL DEFAULT NULL, " .
                    "`src` TEXT NULL, " .
                    "`width` TINYTEXT NULL DEFAULT '500px', " .
                    "`height` TINYTEXT NULL DEFAULT '500px', " .
                    "`autoplay` CHAR(1) NULL DEFAULT '0', ".
                    "`fullscreen` CHAR(1) NULL DEFAULT '0', ".
                    "`button_text` TINYTEXT NULL DEFAULT 'Accept &amp; proceed', " .
                    "`link` TINYTEXT NULL DEFAULT NULL, " .
                    'INDEX `FK_yt_:prefix:mod_extcont_:prefix:sections` (`section_id`), ' .
                    'CONSTRAINT `FK_yt_:prefix:mod_extcont_:prefix:sections` FOREIGN KEY (`section_id`) REFERENCES `:prefix:sections` (`section_id`) ON UPDATE CASCADE ON DELETE CASCADE ' .
                    ") COLLATE='utf8mb4_bin' ENGINE=InnoDB;"
                );
                self::db()->query(
                    'INSERT INTO `:prefix:'.self::$tablename.'` ' .
                    '(`section_id`) VALUES ( ? )',
                    array($section_id)
                );
            }
        }   // end function checkTable()
        
    }
}