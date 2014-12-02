<?php

abstract class MyLib_BaseController extends Zend_Controller_Action
{

  public function preDispatch()
  {
    parent::preDispatch();

    $request = new Zend_Controller_Request_Http();
    $cart = $request->getCookie('cart');
    $cart = unserialize($cart);
    $total_cart = $cart ? count($cart) : false;

    $this->view->total_cart = $total_cart;

  }

}
