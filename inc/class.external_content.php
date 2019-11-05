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

namespace CAT\Addon;

use \CAT\Base as Base;
use \CAT\Addon\external_content\IManager;

if (!class_exists('external_content', false))
{
    class external_content extends \CAT\Addon\Page
    {
        protected static $type        = 'page';
        protected static $directory   = 'external_content';
        protected static $name        = 'external_content';
        protected static $version     = '1.0';
        protected static $description = '';
        protected static $author      = "BlackCat Development";
        protected static $guid        = "";
        protected static $license     = "GNU General Public License";
        protected static $manager     = null;

        /**
         *
         * @access public
         * @return
         **/
        public static function initialize(array $section)
        {
            // variant
            $variant  = \CAT\Sections::getVariant($section['section_id']);
            // find class
            $file = CAT_ENGINE_PATH.'/modules/'.self::$directory.'/templates/'.$variant.'/inc/class.'.$variant.'.php';
            if(file_exists($file)) {
                require_once $file;
                $classname = '\CAT\Addon\external_content\Manager\\'.$variant;
                self::$manager = new $classname();
            }
        }   // end function initialize()
        

        /**
         *
         * @access public
         * @return
         **/
        public static function modify(array $section)
        {
            // variant
            $variant  = \CAT\Sections::getVariant($section['section_id']);

            // load form
            $form = \wblib\wbForms\Form::loadFromFile(
                $variant,
                'inc.forms.php',
                CAT_ENGINE_PATH.'/modules/'.self::$directory.'/templates/'.$variant
            );

            // save changes
            if ($form != false && $form->isSent() && $form->isValid()) {
                $data = $form->getData();
                foreach($data as $key => $value) {
                    if(is_string($value)) {
                        $data[$key] = htmlspecialchars($value);
                    }
                }
                self::$manager->savedata($section,$data);
            }

            parent::modify($section); // sets template path(s)

            // add to template search path
            self::tpl()->setPath(CAT_ENGINE_PATH.'/modules/'.self::$directory.'/templates/'.$variant);

            $data = (
                is_object(self::$manager)
                ? self::$manager->getData($section)
                : array()
            );

            if ($form != false) {
                $form->setData($data);
                $form->getElement('section_id')->setValue($section['section_id']);
                $form->getElement('page_id')->setValue(\CAT\Page::getID());
                $form->setAttribute('_auto_buttons', false);
                $form->setAttribute('action', CAT_ADMIN_URL.'/pages/edit/'.\CAT\Page::getID());
                return $form->render(1);
            } else {
                echo "no such form";
            }
        }   // end function modify()

        /**
         *
         * @access public
         * @return
         **/
        public static function view(array $section)
        {
            // variant
            $variant  = \CAT\Sections::getVariant($section['section_id']);

            // add to template search path
            self::tpl()->setPath(CAT_ENGINE_PATH.'/modules/'.self::$directory.'/templates/'.$variant);

            // get the data
            $data = self::$manager->getData($section);$data = (
                is_object(self::$manager)
                ? self::$manager->getData($section)
                : array()
            );

            // output
            return self::tpl()->output(
                'view.tpl',
                $data
            );
        }   // end function view()
    }
}
