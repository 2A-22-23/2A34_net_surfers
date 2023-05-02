<?php 
 
// Product Details 
// Minimum amount is $0.50 US 
$itemName = "Demo Product"; 
$itemPrice = 25;  
$currency = "USD";  
 
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_API_KEY', 'sk_test_51N2GV8CgcYijvt3dJSp9clqEOpSfgUucVXfksS0lIZpUE1eCuaoUfSpgi2mfkH2yY3YhKkajRfiLZDiYu3qNGy0T00Lfjyf2z2'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51N2GV8CgcYijvt3dbP8Dwgun40JfV2J2TxxGxzqxdLukreuAs4XF1Ze9OebMGWc3Ip8MLegTXVoLFQgIeJLK9FSO00UuhP7zsS'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'ecommerce'); 
 
?>