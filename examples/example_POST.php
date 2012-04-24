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


// Create a new category
// See: http://apidocs.ondango.com/rest/category/post.php
$results = $ondango->POST ("category", array ("shop_id" => 50, "name" => "T-Shirt's", "order" => 1));


// Display results
echo '<pre>';
print_r ($results);
echo '</pre>';
?>