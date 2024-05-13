<?php

namespace Controllers;

use Models\cart;

class CartController extends \Core\BaseController
{
    protected string $Model = "Cart";

    public function show()
    {
        $user_id  = (isset($_GET['user_id'])    && !empty($_GET['user_id']))   ? $_GET['user_id']   :  '1';

        $data = $this->Database->getCart($user_id);

        $Carts = array();
        foreach ($data as $elem) {
            $products = $this->Database->getProductName($elem['product_item_id']);
            $product = $products[0];
            $elem_format = array(
                "id" => $elem['id'],
                "quanty" => $elem['quanty'],
                "total" => $elem['quanty'] * $product['price'],
                "product_item_id" => $elem['product_item_id'],
                "product_image" => $product['product_image'],
                "product_name" => $product['name'],
                "product_price" => $product['price'],
            );
            array_push($Carts, $elem_format);
        }

        view('cart/list-cart', compact('Carts'));
    }
    public function getCart()
    {
        $user_id  = (isset($_GET['user_id'])    && !empty($_GET['user_id']))   ? $_GET['user_id']   :  '1';

        $Carts = $this->Database->getCart($user_id);

        $result = array('data' => $Carts);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;
        $quan  = (isset($_POST['quan'])    && !empty($_POST['quan']))   ? $_POST['quan']   :  null;
        $cart_id  = (isset($_POST['cart_id'])    && !empty($_POST['cart_id']))   ? $_POST['cart_id']   :  null;
        $product_id  = (isset($_POST['product_id'])    && !empty($_POST['product_id']))   ? $_POST['product_id']   :  null;

        if ($product_id == null || $quan == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->addToCart($cart_id, $quan, $product_id);

        $result = array('data' => $result);

        $this->Database->sendResponse(200, json_encode($result));
    }
    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;

        $image  = (isset($_POST['image'])    && !empty($_POST['image']))   ? $_POST['image']   :  null;
        $id  = (isset($_POST['id'])    && !empty($_POST['id']))   ? $_POST['id']   :  null;
        $Cart_name  = (isset($_POST['Cart_name'])    && !empty($_POST['Cart_name']))   ? $_POST['Cart_name']   :  null;
        $is_active  = (isset($_POST['is_active'])  && !empty($_POST['is_active'])) ? '1'  :  '0';
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  '';

        if ($Cart_name == null || $image == null || $id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }

        $result = $this->Database->updateCart($id, $Cart_name, $image, $is_active, $description);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;

        $id  = (isset($_POST['id']) && !empty($_POST['id']))   ? $_POST['id']   :  null;

        if ($id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ nha");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->delete($id);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function getProductName()
    {
        $msg = null;

        $id  = (isset($_GET['id']) && !empty($_GET['id']))   ? $_GET['id']   :  null;

        if ($id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ nha");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->getProductName($id);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
}
