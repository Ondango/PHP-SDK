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


// Retrieve all sales for a specific shop
// See: http://www.ondango.com/apidocs/rest/sales/all/get.php
$results = $ondango->GET ("sales/all", array ("shop_id" => 50));


// Display results
echo '<pre>';
print_r ($results);
echo '</pre>';
?>