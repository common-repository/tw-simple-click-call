<?php

		if (!defined('ABSPATH')) {
    		exit; // Exit if accessed directly
		}
		require(TWSCC_PLUGIN_PATH.'twilio-php/Services/Twilio/Capability.php');

		// put your Twilio API credentials here
		
		if(isset($result['0']->account_sid) && isset($result['0']->auth_token))
		{
			$accountSid = $result['0']->account_sid;
			$authToken  = $result['0']->auth_token;
		 
		// put your Twilio Application Sid here
			$appSid     = $result['0']->app_sid;
			$twilio_number     = $result['0']->twilio_number;
	
			$capability = new Services_Twilio_Capability($accountSid, $authToken);
			$capability->allowClientOutgoing($appSid);
			$capability->allowClientIncoming('jenny');
			$token = $capability->generateToken();
		}
		 
?>
	 
<div class="container">
	
	<?php
	if(!isset($result['0']->account_sid) && !isset($result['0']->auth_token))
		{
			echo "<p style='color:red'>Please insert your Twilio Details First.</p>"; 
		}
	
	?>
	<div id="setup_token" style='display:none;'><?php echo $token; ?></div>
	<div id="caller_id_twilio" style='display:none;'><?php echo $twilio_number?></div>
	  <div class="main">
    <div class="logo"><img src="<?php echo TWSCC_PLUGIN_URL.'images/logo.png'?>"  /></div>
    
    <div class="buttons">
    <div class="btn">
        <button class="call" onclick="call();"><img src="<?php echo TWSCC_PLUGIN_URL.'images/call_icon.png'?>" alt="" /> Call</button>
    </div>
    
    <div class="btn_2">
        <button class="hangup" onclick="hangup();"><img src="<?php echo TWSCC_PLUGIN_URL.'images/hang_up.png'?>" alt="" /> Hangup</button>
    </div>
    <div class="clear"></div>
    
    
    </div>
    <div class="text_box">
    	<input type="text" class="twilio_call_number" id="number"/>

    	 
    <div class="btn_3">
        <div id="log">Loading pigeons...</div><!--<button> READY</button>-->
    </div>
    
    <!--<div class="ready_btn"> <a class="Ready" href="#">READY</a></div>-->
    
    </div>
</div>

<!--
			<button class="call" onclick="call();">
			  Call
			</button>
		 
			<button class="hangup" onclick="hangup();">
			  Hangup
			</button>
		 
			<input type="text" id="number" name="number"
			  placeholder="Enter a phone number to call"/>
		 
			<div id="log">Loading pigeons...</div>
			
-->
		  </body>
		</html>