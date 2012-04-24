<?php
/**
 * Ondango Team
 * 
 * www.ondango.com 
 * apidocs.ondango.com
 */

require_once "../libs/Ondango.php";

$api_key = "YOUR API KEY";
$api_secret = "YOUR SECRET KEY";	// optional
$ondango = new Ondango ($api_key, $api_secret);


// Delete a shop
// See: http://apidocs.ondango.com/rest/shop/delete.php
$results = $ondango->DELETE ("shop", array ("shop_id" => 50));


// Display results
echo '<pre>';
print_r ($results);
echo '</pre>';
?>