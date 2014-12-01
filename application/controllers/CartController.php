<?php

class CartController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $request = new Zend_Controller_Request_Http();
      $cart = $request->getCookie('cart');

      $cart = unserialize($cart);
      
      if($cart):
        $products = new Application_Model_Product();

        $list = array();
        $total = 0;
        foreach($cart as $key => $value):
          $product = $products->get($key);
          array_push($list, $product[0]);
          $total += $product[0]['price'];
        endforeach;

        $this->view->list = $list;
        $this->view->total = $total;
      endif;
    }

    public function addAction()
    {
        $id = $this->_getParam("id");

        $request = new Zend_Controller_Request_Http();
        $cart = $request->getCookie('cart');

        $cart = unserialize($cart);
        $cart[$id] += 1;

        setcookie('cart', serialize($cart), time() + 3600, '/');

        $this->_redirect('/cart');
    }

    public function removeAction()
    {
      $id = $this->_getParam("id");

      $request = new Zend_Controller_Request_Http();
      $cart = $request->getCookie('cart');

      $cart = unserialize($cart);
      unset($cart[$id]);

      setcookie('cart', serialize($cart), time() + 3600, '/');

      $this->_redirect('/cart');
    }


}
