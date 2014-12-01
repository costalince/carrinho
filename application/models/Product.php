<?php

class Application_Model_Product extends Zend_Db_Table
{
  protected $_name = 'product';
  protected $_primary = 'id';

  public function cols(array $colunas){
    return $this->select()->from($this,$colunas);
  }

  public function get($id){
    $cache = Zend_Registry::get('cache');

    if(!($select = $cache->load((string)$id))):
      $select = $this->find($id)->toArray();
      $cache->save($select,(string)$id);
    endif;

    return $select;
  }

  public function getAllCache(){
    try{
      $products = Application_Model_Mongo_Product::all();

      $list = array();
      foreach ($products as $product) {
        $prepare = array(
          'id'        => $product->id,
          'name'      => $product->name,
          'description' => $product->description,
          'price'     => $product->price,
          'features'  => $product->features
        );

        array_push($list,$prepare);
      }
    } catch(Exception $e){
      $list = null;
    }

    return $list;
  }

  public function getAll(){
    $select = $this->cols(array('*'));

    if($list = $this->fetchAll($select)){
      $list = $list->toArray();
    }

    return $list;
  }

  public function search($text){
    $select = $this->cols(array('*'))
                    ->where('name like ?',"%$text%")
                    ->orWhere('description like ?',"%$text%");

    if($find = $this->fetchAll($select)):
      $list = $find->toArray();
    else:
      $list = null;
    endif;

    return $list;
  }
}
