<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
	}
	wp_enqueue_style('twilio-phone-css', TWSCC_PLUGIN_URL . 'css/intlTelInput.css');
		wp_enqueue_script('jquery-live-script', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
	wp_enqueue_script('twilio-phone', TWSCC_PLUGIN_URL . 'js/intlTelInput.min.js', array('jquery'));
	wp_enqueue_script('twilio-util', TWSCC_PLUGIN_URL . 'js/utils.js');
	wp_enqueue_script('twilio-script', TWSCC_PLUGIN_URL . 'js/twilio-script.js');
	
	wp_enqueue_script('twilio-call-script', '//media.twiliocdn.com/sdk/js/client/v1.3/twilio.min.js');
	wp_enqueue_script('twilio-custom-script', TWSCC_PLUGIN_URL . 'js/twilio-custom.js');
	wp_register_style('style.css', TWSCC_PLUGIN_URL . 'css/style.css');
	wp_enqueue_style('style.css');
	global $wpdb;
	$table_name=$wpdb->prefix.'twilio_detail';
	$result = $count=$wpdb->get_results("SELECT * FROM $table_name");
	require('twilio_main.php');
?>
