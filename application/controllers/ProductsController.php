<?php

class ProductsController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction()
    {
        $cache = Zend_Registry::get('cache');
        $id = $this->_getParam("id");

        $model_product = new Application_Model_Product();
        $this->view->product = $model_product->get($id);
    }


}
