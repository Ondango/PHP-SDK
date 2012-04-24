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


// Update the price of a product
// See: http://apidocs.ondango.com/rest/product/put.php
$results = $ondango->PUT ("product", array ("product_id" => 10, "price" => 110.99, "price_old" => 149.99));


// Display results
echo '<pre>';
print_r ($results);
echo '</pre>';
?>