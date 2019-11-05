<?php
$FORMS = array(
    'youtube' => array(
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
            'value' => 'Eingebettetes YouTube-Video',
        ),
        array(
            'type' => 'textarea',
            'name' => 'info',
            'label' => 'Info text (description of the content and/or the data transferred during the call)',
            'required' => true,
            'value' => '<p><b>Hinweis:</b> Dieses eingebettete Video wird von YouTube, LLC, 901 Cherry Ave., San Bruno, CA 94066, USA bereitgestellt.<br>Beim Abspielen wird eine Verbindung zu den Servern von YouTube hergestellt. Dabei wird YouTube mitgeteilt, welche Seiten Sie besuchen. Wenn Sie in Ihrem YouTube-Account eingeloggt sind, kann YouTube Ihr Surfverhalten Ihnen persönlich zuzuordnen. Dies verhindern Sie, indem Sie sich vorher aus Ihrem YouTube-Account ausloggen.</p><p>Wird ein YouTube-Video gestartet, setzt der Anbieter Cookies ein, die Hinweise über das Nutzerverhalten sammeln.</p><p>Wer das Speichern von Cookies für das Google-Ads-Programm deaktiviert hat, wird auch beim Anschauen von YouTube-Videos mit keinen solchen Cookies rechnen müssen. YouTube legt aber auch in anderen Cookies nicht-personenbezogene Nutzungsinformationen ab. Möchten Sie dies verhindern, so müssen Sie das Speichern von Cookies im Browser blockieren.</p><p>Weitere Informationen zum Datenschutz bei &quot;YouTube&quot; finden Sie in der Datenschutzerklärung des Anbieters unter: <a href=&quot;{$link}&quot; rel=&quot;noopener&quot; target=&quot;_blank&quot;>{$link}</a></p>',
            'helptext' => 'If you need a translation, please add it to the appropriate language file.',
        ),
        array(
            'type' => 'text',
            'name' => 'link',
            'label' => 'YouTube Policy link',
            'value' => 'https://www.google.de/intl/de/policies/privacy/',
            'required' => true,
            'helptext' => 'To use the link in the info text, use <strong>{$link}</strong> as a placeholder.',
        ),
        array(
            'type' => 'text',
            'name' => 'src',
            'label' => 'YouTube Video link',
            'value' => 'https://www.youtube-nocookie.com/embed/DBXH9jJRaDk',
            'required' => true,
            'helptext' => 'Hint: Use https://www.youtube-nocookie.com/embed/ as your link base and add the video id (example: DBXH9jJRaDk) to the end',
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
