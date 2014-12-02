<?php

class CheckoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $this->_helper->layout->disableLayout();
      $ids = $this->_getParam("id");
      if(!$ids):
        $this->_redirect('/cart');
      endif;


      $list = array();
      $total = 0;
      $model_product = new Application_Model_Product();
      foreach($ids as $id):
        $product = $model_product->get($id);
        array_push($list,$product[0]);
        $total += $product[0]['price'];
      endforeach;

      $this->view->list = $list;
      $this->view->total = $total;
    }

    public function saveAction()
    {
      $this->_helper->viewRenderer->setNoRender(true);
      $this->_helper->layout->disableLayout();
      $params = $this->_request->getParams();


      $checkout = new Application_Model_Checkout();

      $data = array();
      $data['email'] = $params['checkout']['email'];
      $data['first_name'] = $params['checkout']['shipping_address']['first_name'];
      $data['last_name'] = $params['checkout']['shipping_address']['last_name'];
      $data['address1'] = $params['checkout']['shipping_address']['address1'];
      $data['address2'] = $params['checkout']['shipping_address']['address2'];
      $data['city'] = $params['checkout']['shipping_address']['city'];
      $data['country'] = $params['checkout']['shipping_address']['country'];
      $data['province'] = $params['checkout']['shipping_address']['province'];
      $data['zip'] = $params['checkout']['shipping_address']['zip'];
      $data['phone'] = $params['checkout']['shipping_address']['phone'];
      $data['ids'] = $params['ids'];

      $checkout_id = $checkout->insert($data);
      $encode = base64_encode($checkout_id);

      setcookie('cart', '', 0, '/');

      $this->_redirect('/checkout/thankyou/p/'.$encode);
    }

    public function thankyouAction()
    {
      $this->_helper->layout->disableLayout();
      $p = $this->_getParam("p");
      $id = base64_decode($p);

      $checkout = new Application_Model_Checkout();
      $order = $checkout->get($id);

      $this->view->order = $order[0];
    }

}
