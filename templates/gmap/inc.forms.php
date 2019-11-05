<?php
$FORMS = array(
    'gmap' => array(
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
        ),
        array(
            'type' => 'textarea',
            'name' => 'info',
            'label' => 'Info text (description of the content and/or the data transferred during the call)',
            'required' => true,
            'value' => 'To protect your data, the Google Maps map was not directly linked. By clicking on the button, you agree that data may be transferred to Google. Please read the <a href="{$link}">Google Privacy Policy</a> for more details.',
            'helptext' => 'If you need a translation, please add it to the appropriate language file. The default text already has a translation for English and German.',
        ),
        array(
            'type' => 'text',
            'name' => 'google_policy',
            'label' => 'Google Maps Policy link',
            'value' => 'https://policies.google.com/privacy?hl=de',
            'required' => true,
            'helptext' => 'To use the link in the info text, use <strong>{$link}</strong> as a placeholder.',
        ),
        array(
            'type' => 'textarea',
            'name' => 'src',
            'label' => '&lt;iframe&gt; source, as provided by Google Maps',
            'required' => true,
            'helptext' => 'You can paste the full HTML here, the link will be extracted on save',
        ),
        array(
            'type' => 'text',
            'name' => 'width',
            'label' => 'Width (examples: 500px, 50%)',
        ),
        array(
            'type' => 'text',
            'name' => 'height',
            'label' => 'Height (examples: 500px, 50%)',
        ),
        array(
            'type' => 'text',
            'name' => 'button_text',
            'label' => 'Button text',
            'value' => 'Accept &amp; proceed',
        ),
    )
);
