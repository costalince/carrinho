<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

  protected function _initConnection() {
    $options = $this->getOption('resources');

    $db_adapter = $options['db']['adapter'];
    $params = $options['db']['params'];

    try {

      $db = Zend_Db :: factory($db_adapter,$params);

      $db->getConnection();

      $registry = Zend_Registry :: getInstance();
      $registry->set('db', $db);

    } catch (Zend_Exception $e) {
      echo "Estamos com problemas em nossos servidores. Favor aguarde!";
    }

  }
}
