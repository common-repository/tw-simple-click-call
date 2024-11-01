




<?php
/*
  Plugin Name: Twilio Simple Click Call
  Plugin URI: clients@iapptechnologies.com
  Description: Twilio-simple-click-call converts your website's users into engaged customers by creating an easy way for your customers to contact your sales and support teams right on your website. Your users can input a phone number and receive a phone call connecting to any destination phone number you like.
  Version: 1.0.3
  Author: IAPP Technologies
  Author URI: http://iapptechnologies.com
  License: GPLv2 or later
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
include_once("includes/mysql.php");
$install = new Twillo_simple_click_calling_install(__FILE__);
define('TWSCC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('TWSCC_PLUGIN_PATH', plugin_dir_path(__FILE__));
define( 'WP_DEBUG', true );
class TWSCC_Calling{


		public function __construct() {

             
            add_action('admin_menu', array($this, 'twscc_twilio_settings_page'));
            add_action('wp_print_scripts',array($this, 'twscc_test_ajax_load_scripts'));
            add_action('wp_ajax_create_twilio_api',array($this, 'twscc_create_twilio_api_process_request'));

        }



        public function twscc_test_ajax_load_scripts() {

        		 
			// load our jquery file that sends the $.post request
			wp_enqueue_script( "ajax-test", plugin_dir_url( __FILE__ ) . '/js/custom.js', array( 'jquery' ) );
		 
			// make the ajaxurl var available to the above script
			wp_localize_script( 'ajax-test', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );	
		}

      
        
        public function twscc_twilio_settings_page(){

      // add_menu_page('IAPP Twilio Call', 'IAPP Twilio Call', 'manage_options', 'edit_detail', array($this, 'edit_details'), 'dashicons-phone');
      // add_submenu_page( 'edit_detail', 'Edit details', 'Edit details',1, 'edit_detail', array($this,'edit_detail' );
		  

		add_menu_page("Twilio Call", "Twilio Call", 1, "twscc_edit_twilio_details", array($this, 'twscc_edit_twilio_details'),'dashicons-phone');
		//add_submenu_page( 'twscc_edit_twilio_details', 'Edit details', 'Edit details',1, '', 'twscc_edit_twilio_details' );
		add_submenu_page( 'twscc_edit_twilio_details', 'Make Call', 'Make Call',0, 'twscc_make_call', array($this,'twscc_make_call') );
		add_submenu_page( 'twscc_edit_twilio_details', 'Logs', 'Logs',0, 'twscc_logs', array($this,'twscc_logs') );
		

        }
        public function twscc_create_twilio_api_process_request() 
        {
        
        	include( TWSCC_PLUGIN_PATH . 'class/base.php');
        	$obj = new Base;
        	$obj->api_request($_POST);
	  
    	}
        public function twscc_edit_twilio_details()
		{
			
			include('includes/edit_detail.php');
		}

		public function twscc_available_numbers()
		{
			include('includes/available_twilio_number.php');
		}

		public function twscc_make_call()
		{
			include('includes/make_call.php');
		}
		public function twscc_logs()
		{
			include('includes/logs.php');
			 
		}

		public function twscc_my_users()
		{
			include('includes/my_users.php');
		}

		public function twscc_front_makecall( $atts ){
			include('includes/make_call.php');
		}

		//add_shortcode( 'front_make_call', 'front_makecall' );




}
 $twilio = new TWSCC_Calling();
 
