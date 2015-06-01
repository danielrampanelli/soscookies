<?php

/*
Setting: soscookies_options
Tab: Policy
Tab Order: 20
*/

piklist('field', array(
	'type' => 'select',
	'field' => 'policy',
	'label' => _x('Page', 'admin', 'soscookies'),
    'columns' => 4,
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
	'type' => 'select',
	'field' => 'language',
	'label' => _x('Language', 'admin', 'soscookies'),
    'columns' => 4,
	'choices' => array(
        '' => _x('Default', 'admin', 'soscookies'),
        'en' => _x('English', 'admin', 'soscookies'),
        'it' => _x('Italian', 'admin', 'soscookies'),
	),
));

piklist('field', array(
	'type' => 'text',
	'field' => 'name',
	'label' => _x('Name', 'admin', 'soscookies'),
    'columns' => 6,
));

piklist('field', array(
	'type' => 'text',
	'field' => 'address',
	'label' => _x('Address', 'admin', 'soscookies'),
    'columns' => 12,
));

?>