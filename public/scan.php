<?php
require_once 'init.php';

$sql = new Application_Model_Product();
$products = $sql->getAll();

try{
  $mongop = new Application_Model_Mongo_Product();
  $mongop->remove(array());

  foreach($products as $product){
    $mongo = new Application_Model_Mongo_Product();
    $mongo->id = $product['id'];
    $mongo->name = $product['name'];
    $mongo->description = $product['description'];
    $mongo->price = $product['price'];
    $mongo->features = $product['features'];
    $mongo->img = $product['img'];
    $mongo->save();
  }
} catch(Exception $e){
  echo 'MongoDB is not installed/running';
}
