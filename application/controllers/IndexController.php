<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $product = new Application_Model_Product();
        
        if(!$products = $product->getAllCache()){
          $products = $product->getAll();
        }

        $this->view->products = $products;
    }


}
