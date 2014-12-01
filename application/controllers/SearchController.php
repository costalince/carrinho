<?php

class SearchController extends MyLib_BaseController
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $q = $this->_getParam("q");

      $product = new Application_Model_Product();
      $this->view->products = $product->search($q);

      $this->view->q = $q;
    }


}
