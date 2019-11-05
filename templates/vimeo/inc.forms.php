<?php
$FORMS = array(
    'vimeo' => array(
        array(
            'type' => 'hidden',
            'name' => 'section_id',
        ),
        array(
            'type' => 'hidden',
            'name' => 'page_id',
        ),
        array(
            'type' => 'text',
            'name' => 'title',
            'label' => 'Title',
            'required' => true,
            'value' => 'Eingebettetes Vimeo-Video',
        ),
        array(
            'type' => 'textarea',
            'name' => 'info',
            'label' => 'Info text (description of the content and/or the data transferred during the call)',
            'required' => true,
            'value' => '<p><b>Hinweis:</b> Dieses eingebettete Video wird von Vimeo, Inc., 555 West 18th Street, New York, New York 10011, USA bereitgestellt.<br>Beim Abspielen wird eine Verbindung zu den Servern von Vimeo hergestellt. Dabei wird Vimeo mitgeteilt, welche Seiten Sie besuchen. Wenn Sie in Ihrem Vimeo-Account eingeloggt sind, kann Vimeo Ihr Surfverhalten Ihnen persönlich zuzuordnen. Dies verhindern Sie, indem Sie sich vorher aus Ihrem Vimeo-Account ausloggen.</p><p>Wird ein Vimeo-Video gestartet, setzt der Anbieter Cookies ein, die Hinweise über das Nutzerverhalten sammeln.</p><p>Weitere Informationen zum Datenschutz bei „Vimeo“ finden Sie in der Datenschutzerklärung des Anbieters unter: <a href=&quot;{$link}&quot; rel=&quot;noopener&quot; target=&quot;_blank&quot;>{$link}</a></p>',
            'helptext' => 'If you need a translation, please add it to the appropriate language file.',
        ),
        array(
            'type' => 'text',
            'name' => 'link',
            'label' => 'Vimeo Policy link',
            'value' => 'https://vimeo.com/privacy/',
            'required' => true,
            'helptext' => 'To use the link in the info text, use <strong>{$link}</strong> as a placeholder.',
        ),
        array(
            'type' => 'text',
            'name' => 'src',
            'label' => 'Vimeo Video link',
            'value' => 'https://player.vimeo.com/video/323783503',
            'required' => true,
            'helptext' => 'Hint: Use https://player.vimeo.com/video/ as your link base and add the video id (example: 323783503) to the end',
        ),
        array(
            'type' => 'checkbox',
            'name' => 'autoplay',
            'label' => 'Enable Autoplay',
            'checked' => false,
            'options' => array(1=>'Yes'),
        ),
        array(
            'type' => 'checkbox',
            'name' => 'fullscreen',
            'label' => 'Allow fullscreen',
            'checked' => false,
            'options' => array(1=>'Yes'),
        ),
        array(
            'type' => 'text',
            'name' => 'width',
            'label' => 'Width (examples: 500px, 50%)',
            'value' => '500px',
        ),
        array(
            'type' => 'text',
            'name' => 'height',
            'label' => 'Height (examples: 500px, 50%)',
            'value' => '500px',
        ),
        array(
            'type' => 'text',
            'name' => 'button_text',
            'label' => 'Button text',
            'value' => 'Accept &amp; proceed',
        ),
    )
);
