<?php

class ProductsController extends MyLib_BaseController
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
