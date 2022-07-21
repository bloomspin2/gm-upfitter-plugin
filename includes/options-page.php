<?php
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Automotive Matrix',
		'menu_title'	=> 'Automotive Matrix',
		'menu_slug' 	=> 'automotive-matrix',
        'icon_url'          => 'dashicons-car',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


function delete_automatrix_tansients(){

    $screen = get_current_screen();
    if (strpos($screen->id, "automotive-matrix") == true) {

        if( get_field('csv_files', 'option') ) {

            while( the_repeater_field('csv_files', 'option') ) {

                $csvYear[get_sub_field('csv_year')] = get_transient('auto_matrix_json_'.get_sub_field('csv_year'));

                if($csvYear[get_sub_field('csv_year')]){
                    delete_transient('auto_matrix_json_'.get_sub_field('csv_year'));
                }
            }
        }
    }

}

add_action('acf/save_post', 'delete_automatrix_tansients', 20);
?>
