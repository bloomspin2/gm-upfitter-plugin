<?php

/**
 *
 *
 * @since             1.0.0
 * @package           custom-gravityfields
 *
 * @wordpress-plugin
 * Plugin Name:       GM Upfitter Vehicle Matrix
 * Description:       GM Upfitter Vehicle Matrix
 * Version:           1.0.0
 * Text Domain:       upfitter-vehicle-matrix
 * Domain Path:       /languages
 * Author: Ryan Eyres
 */

define( 'PLUGIN_NAME_VERSION', '1.0.0' );
include('includes/options-page.php');
include('includes/acf.php');
include('includes/gravity-forms-year.php');
include('includes/gravity-forms-make.php');
include('includes/gravity-forms-model.php');
include('includes/gravity-forms-type.php');

function custom_gravity_fields() {


}
custom_gravity_fields();

function enqueue_custom_script( $form, $is_ajax ) {

        wp_enqueue_script( 'upfitter-vehicle-matrix', plugin_dir_url( __FILE__ ) . 'js/custom-gravityfields.js' );
}
add_action( 'gform_enqueue_scripts', 'enqueue_custom_script', 10, 2 );

?>
