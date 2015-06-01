<?php

/*
Setting: soscookies_options
Tab: Policy
Tab Order: 20
*/

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

?>