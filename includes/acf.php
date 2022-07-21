<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
'key' => 'group_627d4f056b521',
'title' => 'Automotive Matrix',
'fields' => array(
array(
'key' => 'field_627d4f0b7d076',
'label' => 'CSV File',
'name' => 'csv_files',
'type' => 'repeater',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
    'width' => '',
    'class' => '',
    'id' => '',
),
'collapsed' => '',
'min' => 0,
'max' => 0,
'layout' => 'row',
'button_label' => 'Add Matrix CSV',
'sub_fields' => array(
    array(
        'key' => 'field_627d670d638ae',
        'label' => 'CSV Year',
        'name' => 'csv_year',
        'type' => 'number',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => 2015,
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'min' => 2015,
        'max' => 3000,
        'step' => '',
    ),
    array(
        'key' => 'field_627d6747638af',
        'label' => 'CSV Upload',
        'name' => 'csv_file',
        'type' => 'file',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'return_format' => 'array',
        'library' => 'all',
        'min_size' => '',
        'max_size' => '',
        'mime_types' => 'csv',
    ),
),
),
),
'location' => array(
array(
array(
    'param' => 'options_page',
    'operator' => '==',
    'value' => 'automotive-matrix',
),
),
),
'menu_order' => 0,
'position' => 'normal',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => true,
'description' => '',
'show_in_rest' => 0,
));

endif;
?>
