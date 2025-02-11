<?php
	if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
	}
     wp_register_style('style.css', TWSCC_PLUGIN_URL. 'css/style.css');
	wp_enqueue_style('style.css');
   
   include( TWSCC_PLUGIN_PATH . 'class/base.php');

	$obj = new Base;
	 
	$result = $obj->twscc_get_twilio_details();
    
	if(!empty($result))
	{
		$sid = $result['0']->account_sid;
		$auth_token = $result['0']->auth_token;
		$client = $obj->twscc_get_warning_logs($sid,$auth_token);
	
		$get_call_logs = $obj->twscc_get_call_logs($sid,$auth_token);
	}
	 
    
	//foreach ($get_call_logs->account->calls as $call) {
	//	
	//		echo "<pre>";
	//		print_r($call);
	//	}
	//	die;
?>
<div class="logg_section">
	<a class="download_here"  href="https://codecanyon.net/item/twilio-simple-click-call/17437105">Download Pro Version</a>
	<?php
	if(empty($result))
	{
		echo "<p style='color:red'>Please provide twilio details first.</p>";
	}
	
	?>
	<div class="log_tabs">
		<ul id="log_tabs_ul">
			<li class="Outgoing_calls_li active"><a href="#">Outgoing Calls</a></li>
			<li class="error_logs_li"><a href="#">Error Logs</a></li>
		<ul>
	</div>
	<div class="log_content">
		<div class="table_layout outgoing_table" id="Outgoing_calls_li">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Direction</th>
				<th>Outgoing Number</th>
				<th>Call From</th>
				<th>Call Time</th>
				<th>Call duration</th>
				<th>Call cost</th>
		 
			</tr>
			<?php
			if(isset($get_call_logs)){
			foreach ($get_call_logs->account->calls as $call) { 

				  //if($call->to!="")
				  //{
				?>

            
            <tr>
				<td><?php echo $call->direction ?></td>
				<td><?php echo $call->to ?></td>
				<td><?php echo $call->from_formatted; ?></td>
				<td><?php echo $call->start_time; ?></td>
				<td><?php echo $call->duration?></td>
				<td><?php echo $call->price != "" ? '$'.$call->price : '$0'; ?></td>
				 
			</tr>
        	<?php /*}*/ } }?>

		 
			
			 
		</table>
		</div>
		<div class="table_layout error_log_table" id="error_logs_li" style="display:none">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th>Error Messages</th>
				<th>Outgoing Number</th>
				<th>Error Code</th>
				<th>Log level</th>

				
			</tr>
			<?php
			if(isset($client)){
			foreach ($client->alerts as $alert) { if($alert->log_level =="warning") {

				$text_array = explode("&",$alert->alert_text); 
			?>

			<tr>
				<td><?php $text_array[0] = str_replace("="," -> ",$text_array[0]); $text_array[0] = str_replace("+"," ",$text_array[0]); echo $text_array[0];?></td>
				<td><?php $text_array[1] = str_replace("="," -> ",$text_array[1]); $text_array[1] = str_replace("%2B","+",$text_array[1]); echo $text_array[1]; ?></td>
				<td><a href="<?php echo $alert->more_info?>" target='_blank'><?php echo $alert->error_code;?></a></td>
				<td><?php echo $alert->log_level;?></td>
			</tr>
		<?php }} }?>

	 
		 
			 
		</table>
	</div>
	</div>
</div>
<style>

</style>


 