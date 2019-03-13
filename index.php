<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'AltoRouter.php';

$baseurl='/templates/ks3/';
$adminurl='/templates/ks3/admin/';
$router = new AltoRouter();
$router->setBasePath($baseurl);

// setup routes
$router->map('GET','', 'home.php', 'home');
$router->map('GET','about/', 'about-us.php', 'about');
$router->map('GET','products/[i:id]', 'products.php', 'products-woslash');
$router->map('GET','products/[i:id]/', 'products.php', 'products');

$match = $router->match();


if($match['target']){
	if(!empty($match['params'])){
	$id=$match['params']['id'];
  	require $match['target'];
  }
	else{
	require $match['target'];
	}
}
else {
  header("HTTP/1.0 404 Not Found");
  
}
