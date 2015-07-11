<?php
/*
Plugin Name: WP Payeezy Donate
Version: 1.1
Plugin URI: http://bentcorner.com/wp-payeezy-donate/
Description: A simple plugin that connects a WordPress site to First Data's Payeezy Gateway using the Hosted Checkout or Payment Page method. No SSL required! 
Author: Rick Rottman
Author URI: http://bentcorner.com/about/
*/

function wppayeezydonationform() {

$x_login = get_option('x_login') ;
$transaction_key = get_option('transaction_key') ;
$x_recurring_billing_id = get_option('x_recurring_billing_id') ;
$mode = get_option ('mode') ;
$donate_file = plugins_url('wp-payeezy-donate/donate.php');
ob_start();
?>
<div id="wp_payeezy_donation_form">
<form action="<?php echo $donate_file;?>" method="post">
<input name="x_login" value="<?php echo $x_login;?>" type="hidden" > 
<input name="transaction_key" value="<?php echo $transaction_key;?>" type="hidden" >
<input name="x_recurring_billing_id" value="<?php echo $x_recurring_billing_id;?>" type="hidden" >
<input name="mode" value="<?php echo $mode;?>" type="hidden" >
<?php
echo '<p><label>First Name</label><input name="x_first_name" value="" type="text"></p>'; 
echo '<p><label>Last Name</label><input name="x_last_name" value="" type="text"></p>'; 
echo '<p><label>Email</label><input name="x_email" value="" type="text"></p>';
echo '<p><label>Phone</label><input name="x_phone" value="" type="text"></p>';
echo '<p><label>Comment</label><input name="x_invoice_num" value="" type="text"></p>';
echo '<label>Donation Amount</label><br>';
echo '<input type="radio" name="x_amount1" value="10.00"> $10<br>';
echo '<input type="radio" name="x_amount1" value="25.00"> $25<br>';
echo '<input type="radio" name="x_amount1" value="50.00"> $50<br>';
echo '<input type="radio" name="x_amount1" value="75.00"> $75<br>';
echo '<input type="radio" name="x_amount1" value="100.00"> $100<br>';
echo '<input type="radio" name="x_amount1" value="0.00"> Other $ <input id= "other" type="text" name="x_amount2" value="" size="6"><br>';
echo '<br>';
echo '<br>';
echo '<p><input type="checkbox" name="recurring" value="TRUE">&nbsp;Automatically repeat this donation once a month, beginning in 30 days.</p>';
echo '<br>';
echo '<p><input type="submit" value="Donate Now"></p>';
echo '</form>';
echo '</div>';
return ob_get_clean();
}


// create custom plugin settings menu
add_action('admin_menu', 'wppayeezydonate_create_menu');

function wppayeezydonate_create_menu() {

	//create new top-level menu
	add_menu_page('WP Payeezy Donate Settings', 'WP Payeezy Donate', 'administrator', __FILE__, 'wppayeezydonate_settings_page' );

	//call register settings function
	add_action( 'admin_init', 'register_wppayeezydonate_settings' );
}

add_shortcode('wp_payeezy_donation_form', 'wppayeezydonationform');

function register_wppayeezydonate_settings() {
	//register our settings
	register_setting( 'wppayeezydonate-group', 'x_login' );
	register_setting( 'wppayeezydonate-group', 'transaction_key' );
	register_setting( 'wppayeezydonate-group', 'x_recurring_billing_id' );
	register_setting( 'wppayeezydonate-group', 'mode' );
	}

function wppayeezydonate_settings_page() {
?>
<div class="wrap">
<h2>WP Payeezy Donate</h2>
<div style="background: none repeat scroll 0 0 #FFF6D5;border: 1px solid #D1B655;color: #3F2502;margin: 10px 0;padding: 5px 5px 5px 10px;text-shadow: 1px 1px #FFFFFF;">	
 	<p>For instructions on creating a Payment Page and a monthly Recurring Plan, please visit the First Data Payeezy Gateway Knowledge Base:<br>
    <ul>
	<li><a href="https://support.payeezy.com/hc/en-us/articles/204685875-HOW-TO-Setup-a-First-Data-Payeezy-Gateway-Payment-Page" target="_blank">How to create a Payment Page</a></li>
	<li><a href="https://support.payeezy.com/hc/en-us/articles/203731469-An-Introduction-to-Recurring" target="_blank">An Introduction to Recurring</a></li>
	</ul>
    </div>

<h3>Settings</h3>
<form method="post" action="options.php">
    <?php settings_fields( 'wppayeezydonate-group' ); ?>
    <?php do_settings_sections( 'wppayeezydonate-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Payment Page ID</th>
        <td><input type="text" name="x_login" value="<?php echo esc_attr( get_option('x_login') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Transaction Key</th>
        <td><input type="text" name="transaction_key" value="<?php echo esc_attr( get_option('transaction_key') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Recurring Billing ID</th>
        <td><input type="text" name="x_recurring_billing_id" value="<?php echo esc_attr( get_option('x_recurring_billing_id') ); ?>" /></td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Mode</th>
        <td><select name="mode"/>
				<option value="live" <?php if( get_option('mode') == "live" ): echo 'selected'; endif;?> >Live</option>
				<option value="demo" <?php if( get_option('mode') == "demo" ): echo 'selected'; endif;?> >Demo</option>
			</select></td>
		</tr>
		
	</table>
	    
    <?php submit_button(); ?>

</form>
<div style="background: none repeat scroll 0 0 #fff;border: 1px solid #bbb;color: #444;margin: 10px 0;padding: 5px 5px 5px 10px;text-shadow: 1px 1px #FFFFFF;">	
<p>To add the Payeezy donation form to a Page or a Post, add the following <a href="https://codex.wordpress.org/Shortcode" target="_blank">shortcode</a> in the Page or Post's content:</p>
<p><pre> [wp_payeezy_donation_form] </pre></p>
</div>

</div>
<?php } ?>