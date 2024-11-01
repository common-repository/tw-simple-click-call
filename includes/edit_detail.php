<?php
	
    if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
	}
    wp_register_style('style.css', TWSCC_PLUGIN_URL. 'css/style.css');
	wp_enqueue_style('style.css');
	
   include( TWSCC_PLUGIN_PATH . 'class/base.php');

	$obj = new Base;
	$obj->twscc_save_twilio_details();


	$result = $obj->twscc_get_twilio_details();
    
    add_action('wp_ajax_test_response','text_ajax_process_request');
   
?>

<a class="download_here" href="https://codecanyon.net/item/twilio-simple-click-call/17437105">Download Pro Version</a>
<div class="container">
    <div id="loading_image" style="display:none"><img src="<?php echo TWSCC_PLUGIN_URL.'/images/default.svg'?>"  /></div>
<div class="main">
<!-- <div class="logo"><img src="<?php echo TWSCC_PLUGIN_URL.'/images/logo.png'?>"  /></div> -->
<form action="" method="post">
    <div class="main_form">
        <div class="heading"><p>Account SID *</p></div>
        <div class="text_box_1"><input name="detail[account_sid]" id="Twilio_account_sid" type="text"  class="text_filed" value="<?php if(!empty($result)){ echo $result['0']->account_sid;} ?>"/></div>
    </div>
    <div class=" main_form">
        <div class="heading"><p>Authorization Token *</p></div>
        <div class="text_box_1"><input name="detail[auth_token]" id="Twilio_auth_token" type="text"  class="text_filed" value="<?php if(!empty($result)){ echo $result['0']->auth_token;} ?>" /></div>
    </div>
    <div class=" main_form">
        <div class="heading"><p>App SID *</p></div>
        <div class="text_box_1"><input name="detail[app_sid]"  id="Twilio_app_sid" type="text"  class="text_filed" value="<?php if(!empty($result)){ echo $result['0']->app_sid;} ?>"/></div>
        <a href="javascript:;" id="generate_app">Generate App SID</a>
    </div>
    <div class=" main_form">
        <div class="heading"><p>Twilio Verified Number *</p></div>
        <div class="text_box_1"><input name="detail[twilio_number]" type="text" id="verified_number" class="text_filed" value="<?php if(!empty($result)){ echo $result['0']->twilio_number;} ?>"/></div>
    </div>
    <div class="btn_3">
        <button type="submit" name="detail[submit]">SUBMIT</button>
    </div>
</form>
</div>
</div>

 
    <script type="text/javascript" >

    
    </script>  