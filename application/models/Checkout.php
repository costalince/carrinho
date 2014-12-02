<?php

class Application_Model_Checkout extends Zend_Db_Table
{

  protected $_name = 'checkout';
  protected $_primary = 'id';

  public function cols(array $colunas){
    return $this->select()->from($this,$colunas);
  }

  public function get($id){
    $select = $this->find($id)->toArray();
    return $select;
  }

  public function insert(array $data){
    $item['email']        = trim($data['email']);
    $item['first_name']   = trim($data['first_name']);
    $item['last_name'] 	  = trim($data['last_name']);
    $item['address1'] 	  = trim($data['address1']);
    $item['address2'] 	  = trim($data['address2']);
    $item['city'] 	      = trim($data['city']);
    $item['country'] 	    = trim($data['country']);
    $item['province'] 	  = trim($data['province']);
    $item['zip'] 	        = trim($data['zip']);
    $item['phone'] 	      = trim($data['phone']);
    $checkout_id = parent::insert($item);

    if($data)
    foreach($data['ids'] as $product_id):
      $checkout_product = new Application_Model_CheckoutProduct();
      $checkout_product->insert(array(
        'checkout_id'=>$checkout_id,
        'product_id'=>$product_id)
      );
    endforeach;

    return $checkout_id;
  }

}
