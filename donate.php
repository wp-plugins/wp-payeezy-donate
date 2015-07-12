<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>
Processing...
</title>
<style media="screen" type="text/css">

body {
    background-color:#ccc;
}

h2 {
	color:#555;
	font-family:Arial,Sans-serif;
    font-weight:400;
}

</style>
</head>
<body>

<?php 

$mode = $_POST["mode"];

if ( $mode == "live" ) {
				$post_url = "https://checkout.globalgatewaye4.firstdata.com/payment";
			}

else  { $post_url = "https://demo.globalgatewaye4.firstdata.com/payment";
}

?>
<form action="<?php echo $post_url ;?>" method="POST" name="myForm" id="myForm"->
<?php
	$x_amount1 = $_POST["x_amount1"]; // takes the pre-defined amount 
	$x_amount2 = $_POST["x_amount2"]; // takes the manually entered amount
	$recurring = isset($_POST['recurring']); // 
	
	if ( $x_amount1 > 0.00) {
	$x_amount = $_POST["x_amount1"]; // if there is a pre-defined amount selected, even if there is a value entered in "other", it takes the pre-defined amount.
	} else { ($x_amount = $_POST["x_amount2"]); // if there is an "other" amount and its radio button is selected, it takes it. 
	} 
	if ( $recurring == TRUE) {
	$x_recurring_billing = "TRUE"; // Sets up recurring.
	} else { ($x_recurring_billing = "FALSE"); //  
	} 
	
$x_login = $_POST["x_login"];
$transaction_key = $_POST["transaction_key"];
$x_recurring_billing_id = $_POST["x_recurring_billing_id"];
$x_recurring_billing_start_date = date('Y-m-d', strtotime("+30 days"));
$x_recurring_billing_end_date = date('Y-m-d', strtotime("+4 years"));   
$x_first_name = $_POST["x_first_name"];
$x_last_name = $_POST["x_last_name"];
$x_email = $_POST["x_email"];
$x_phone = $_POST["x_phone"];
$x_invoice_num = $_POST["x_invoice_num"];
$x_currency_code = "USD"; // Needs to agree with the currency of the payment page
srand(time()); // initialize random generator for x_fp_sequence
$x_fp_sequence = rand(1000, 100000) + 123456;
$x_fp_timestamp = time(); // needs to be in UTC. Make sure webserver produces UTC
// The values that contribute to x_fp_hash
$hmac_data = $x_login . "^" . $x_fp_sequence . "^" . $x_fp_timestamp . "^" . $x_amount . "^" . $x_currency_code;
$x_fp_hash = hash_hmac('MD5', $hmac_data, $transaction_key);
echo ('<input name="x_login" value="' . $x_login . '" type="hidden">' );
echo ('<input name="x_amount" value="' . $x_amount . '" type="hidden">' );
echo ('<input name="x_fp_sequence" value="' . $x_fp_sequence . '" type="hidden">' );
echo ('<input name="x_fp_timestamp" value="' . $x_fp_timestamp . '" type="hidden">' );
echo ('<input name="x_fp_hash" value="' . $x_fp_hash . '" size="50" type="hidden">' );
echo ('<input name="x_currency_code" value="' . $x_currency_code . '" type="hidden">');

?>
<input name="x_first_name" value="<?php echo $x_first_name ;?>" type="hidden"> 
<input name="x_last_name" value="<?php echo $x_last_name ;?>" type="hidden"> 
<input name="x_email" value="<?php echo $x_email ;?>" type="hidden">
<input name="x_phone" value="<?php echo $x_phone ;?>" type="hidden">
<input name="x_invoice_num" value="<?php echo $x_invoice_num ;?>" type="hidden">
<input name="x_recurring_billing" value="<?php echo $x_recurring_billing ;?>" type="hidden">
<input name="x_recurring_billing_amount" value="<?php echo $x_amount ;?>" type="hidden">
<input name="x_recurring_billing_start_date" value="<?php echo $x_recurring_billing_start_date ;?>" type="hidden">
<input name="x_recurring_billing_end_date" value="<?php echo $x_recurring_billing_end_date ;?>" type="hidden">
<input name="x_recurring_billing_id" value="<?php echo $x_recurring_billing_id ;?>" type="hidden">
<input name="x_line_item" value="Donation<|>Donation<|><?php echo $x_invoice_num ;?><|>1<|><?php echo $x_amount;?><|>N<|>Product Code<|><|><|><|><|>0<|><|><|><?php echo $x_amount;?>"type="hidden">
<input type="hidden" name="x_show_form" value="PAYMENT_FORM"/>
</form>
<center><h2>Processing your  $<?php echo $x_amount;?> donation <?php echo $x_first_name;?>, please wait...</h2></center>
<script type='text/javascript'>document.myForm.submit();</script>
</body>
</html>