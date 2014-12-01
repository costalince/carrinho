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

  public function getAll(){
    $select = $this->cols(array('*'));

    if($list = $this->fetchAll($select)){
      $list = $list->toArray();
    }

    return $list;
  }
}
