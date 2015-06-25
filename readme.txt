=== Plugin Name ===
Contributors: RickRottman
Tags: First Data, Payeezy, Global Gateway e4, Donations, Payments, Hosted Checkout, Payment Page, Recurring, E-Commerce
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily connects WordPress powered website to a First Data Payeezy Payment Page for accepting Credit Card donations. No SSL required.

== Description ==

Plugin creates a shortcode that when placed in the Page or a Post, generates a donation form for a Payeezy Payment Page. The published form includes:

* First Name
* Last Name
* Email Address
* Comment
* The amount to donate. User making the donation can either pick a predefined amount to donate or enter a custom amount.
* User can also choose to make their donation monthly, on an automatic recurring basis, by checking a box. 

Once they have entered their choices, they click the "Donate Now" button. They are then redirected to the secure Payeezy payment form where they finish entering their information including credit card number, expiration date, and security code. The user then clicks "Pay with your credit card" and the payment is made. Once the transaction is complete, the user is provided a receipt. They can then click a button and be redirected back to the original website. 


== Installation ==

From your WordPress dashboard
1. Visit 'Plugins > Add New'
2. Search for 'WP Payeezy Donate'
3. Activate WP Payeezy Donate from your Plugins page.

From WordPress.org
1. Download WP Payeezy Donate.
2. Upload the 'WP Payeezy Donate' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate WP Payeezy Donate from your Plugins page. 


Once Activated
1. Visit 'Menu > WP Payeezy Donate > and enter the Payment Page ID, Transaction Key, and the Recurring Billing ID. All these values are obtained in Payeezy. 
2. Chose the Mode you wish to use, Live for a production account, one that actually processes credit cards, or Demo for a non-production testing account.
3. Press 'Save Settings'.


Once Configured
1. To add a donation form to a Post or a Page, simply add the '[wp_payeezy_donation_form]' shortcode to content. 
2. Publish the Post or Page. 
3. That's it! 

== Frequently Asked Questions ==

= Is this plugin an official First Data Payeezy product? =

No. This plugin is independent of First Data Payeezy, but was built using their [sample code](https://support.payeezy.com/hc/en-us/articles/204011429-Sample-Code-for-Creating-a-Pay-Button-to-use-with-a-Hosted-Payment-Page). 

= Can I style the donation form? =

Yes. Add the following css to your existing stylesheet and modify it as you wish:

#wp_payeezy_donation_form input {
  border: 1px solid #ddd;
  color: #333;
  font-size: 18px;
  font-weight: 400;
  padding: 6px;
  width: auto;
}

#wp_payeezy_donation_form input[type="submit"] {
  padding:20px;
  width:100%;
  color:#fff;
}

#wp_payeezy_donation_form label {
  display: block;
  font-weight: bold;
  margin-bottom: -4px;
  margin-top: 5px;
}

== Screenshots ==

1. WP Payeezy Donate Settings.
2. The shortcode '[wp_payeezy_donation_form]' added to a post.
3. The published donation form ready to be used by someone wishing to make a donation. 

== Changelog ==

No changes yet.


== Upgrade Notice ==

No upgrades yet.