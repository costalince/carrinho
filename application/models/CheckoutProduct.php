<?php

class Application_Model_CheckoutProduct extends Zend_Db_Table
{
  protected $_name = 'checkout_product';
  protected $_primary = 'id';

  public function insert(array $data){
    $item['checkout_id'] 	= $data['checkout_id'];
    $item['product_id']   = $data['product_id'];
    $id = parent::insert($item);
  }
}
