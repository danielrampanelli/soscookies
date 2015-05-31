<?php

/*
Setting: soscookies_options
*/

piklist('field', array(
	'type' => 'select',
	'field' => 'status',
	'label' => _x('Status', 'admin', 'soscookies'),
	'choices' => array(
        '' => _x('Disabled', 'admin', 'soscookies'),
        'testing' => _x('Testing (Administrators)', 'admin', 'soscookies'),
        'yes' => _x('Enabled (All Users)', 'admin', 'soscookies'),
	),
));

piklist('field', array(
	'type' => 'select',
	'field' => 'policy',
	'label' => _x('Policy Page', 'admin', 'soscookies'),
	'choices' => piklist(
		array_merge(
			array(array('ID' => '', 'post_title' => '&mdash;')),
			get_pages(array(
				'sort_column' => 'post_date',
				'sort_order' => 'ASC',
			))
		),
		array('ID', 'post_title')
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => 'cookie_types',
	'label' => _x('Cookie Types', 'admin', 'soscookies'),
	'choices' => array(
        'analytics' => _x('Analytics', 'admin', 'soscookies'),
        'social' => _x('Social', 'admin', 'soscookies'),
        'advertising' => _x('Advertising', 'admin', 'soscookies'),
	),
));

piklist('field', array(
	'type' => 'select',
	'field' => 'consent_type',
	'label' => _x('Consent Type', 'admin', 'soscookies'),
	'choices' => array(
        'explicit' => _x('Explicit (Opt-In)', 'admin', 'soscookies'),
        'implicit' => _x('Implicit (Opt-Out)', 'admin', 'soscookies'),
	),
));

piklist('field', array(
	'type' => 'checkbox',
	'field' => 'refresh_on_consent',
	'label' => _x('Refresh On Consent', 'admin', 'soscookies'),
	'description' => _x('Refresh the page after the user has given his/hers consent.', 'admin', 'soscookies'),
	'choices' => array( 'yes' => '' ),
));

piklist('field', array(
	'type' => 'select',
	'field' => 'theme',
	'label' => _x('Theme', 'admin', 'soscookies'),
	'choices' => array(
        'dark' => 'Dark',
        'light' => 'Light',
        'monochrome' => 'Monochrome',
	),
));

piklist('field', array(
	'type' => 'select',
	'field' => 'banner',
	'label' => _x('Banner', 'admin', 'soscookies'),
	'choices' => array(
        'top' => _x('Top', 'admin', 'soscookies'),
        'bottom' => _x('Bottom', 'admin', 'soscookies'),
	),
));

piklist('field', array(
	'type' => 'select',
	'field' => 'tag',
	'label' => _x('Tag', 'admin', 'soscookies'),
	'choices' => array(
        '' => _x('Disabled', 'admin', 'soscookies'),
        'bottom-left' => _x('Bottom Left', 'admin', 'soscookies'),
        'bottom-right' => _x('Bottom Right', 'admin', 'soscookies'),
        'vertical-left' => _x('Vertical Left', 'admin', 'soscookies'),
        'vertical-right' => _x('Vertical Right', 'admin', 'soscookies'),
	),
));

?>