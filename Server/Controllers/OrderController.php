<?php

namespace Controllers;

use Models\Order;

class OrderController extends \Core\BaseController
{
    protected string $Model = "Order";

    public function show()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? '0'   :  '1';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $data = $this->Database->getOrder($page, $size, $search, $is_active, '3');
        $Orders = array();
        foreach ($data as $order) {
            $payment_method = $this->Database->getPaymentMethod($order['payment_method_id']);
            $shipping_method = $this->Database->getShippingMethod($order['shipping_method']);
            $shipping_address = $this->Database->getAddress($order['shipping_address']);
            $user = $this->Database->getUser($order['user_id']);
            $order_status = $this->Database->getOrderStatus($order['order_status']);
            // $order_status = $this->Database->getOrderLine($order['order_status']);
            $order_format = array(
                "id" => $order['id'],
                "order_total" => $order['order_total'],
                "order_date" => $order['order_date'],
                "shipping_method" => $shipping_method[0]['name'],
                "payment_method" => $payment_method[0]['value'],
                "shipping_address" => $shipping_address[0]['city'],
                "user" => $user[0]['email_address'],
                "order_status" => $order_status[0]['status']
            );
            array_push($Orders, $order_format);
        }
        view('order/list-order', compact('Orders'));
    }
    public function getOrder()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? '0'   :  '1';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $data = $this->Database->getOrder($page, $size, $search, $is_active, '3');
        $Orders = array();
        foreach ($data as $order) {
            $payment_method = $this->Database->getPaymentMethod($order['payment_method_id']);
            $shipping_method = $this->Database->getShippingMethod($order['shipping_method']);
            $shipping_address = $this->Database->getAddress($order['shipping_address']);
            $user = $this->Database->getUser($order['user_id']);
            $order_status = $this->Database->getOrderStatus($order['order_status']);
            // $order_status = $this->Database->getOrderLine($order['order_status']);
            $order_format = array(
                "id" => $order['id'],
                "order_total" => $order['order_total'],
                "order_date" => $order['order_date'],
                "shipping_method" => $shipping_method[0]['name'],
                "payment_method" => $payment_method[0]['value'],
                "shipping_address" => $shipping_address[0]['city'],
                "user" => $user[0]['email_address'],
                "order_status" => $order_status[0]['status']
            );
            array_push($Orders, $order_format);
        }
        $result = array('data' => $Orders);

        $this->Database->sendResponse(200, json_encode($result));
    }
    public function showCanceled()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? '0'   :  '1';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $data = $this->Database->getOrder($page, $size, $search, $is_active, '2');
        $Orders = array();
        foreach ($data as $order) {
            $payment_method = $this->Database->getPaymentMethod($order['payment_method_id']);
            $shipping_method = $this->Database->getShippingMethod($order['shipping_method']);
            $shipping_address = $this->Database->getAddress($order['shipping_address']);
            $user = $this->Database->getUser($order['user_id']);
            $order_status = $this->Database->getOrderStatus($order['order_status']);
            // $order_status = $this->Database->getOrderLine($order['order_status']);
            $order_format = array(
                "id" => $order['id'],
                "order_total" => $order['order_total'],
                "order_date" => $order['order_date'],
                "shipping_method" => $shipping_method[0]['name'],
                "payment_method" => $payment_method[0]['value'],
                "shipping_address" => $shipping_address[0]['city'],
                "user" => $user[0]['email_address'],
                "order_status" => $order_status[0]['status']
            );
            array_push($Orders, $order_format);
        }
        view('order/list-order', compact('Orders'));
    }
    public function showFinised()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? '0'   :  '1';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $data = $this->Database->getOrder($page, $size, $search, $is_active, '1');
        $Orders = array();
        foreach ($data as $order) {
            $payment_method = $this->Database->getPaymentMethod($order['payment_method_id']);
            $shipping_method = $this->Database->getShippingMethod($order['shipping_method']);
            $shipping_address = $this->Database->getAddress($order['shipping_address']);
            $user = $this->Database->getUser($order['user_id']);
            $order_status = $this->Database->getOrderStatus($order['order_status']);
            // $order_status = $this->Database->getOrderLine($order['order_status']);
            $order_format = array(
                "id" => $order['id'],
                "order_total" => $order['order_total'],
                "order_date" => $order['order_date'],
                "shipping_method" => $shipping_method[0]['name'],
                "payment_method" => $payment_method[0]['value'],
                "shipping_address" => $shipping_address[0]['city'],
                "user" => $user[0]['email_address'],
                "order_status" => $order_status[0]['status']
            );
            array_push($Orders, $order_format);
        }
        view('order/list-order', compact('Orders'));
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;

        $image  = (isset($_POST['image'])    && !empty($_POST['image']))   ? $_POST['image']   :  null;
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  null;
        $order_name  = (isset($_POST['order_name'])    && !empty($_POST['order_name']))   ? $_POST['order_name']   :  null;

        if ($order_name == null || $image == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->add($order_name, $image, $description);

        $result = array('data' => $result);

        $this->Database->sendResponse(200, json_encode($result));
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;

        $id  = (isset($_POST['id'])    && !empty($_POST['id']))   ? $_POST['id']   :  null;
        $order_status  = (isset($_POST['order_name'])    && !empty($_POST['order_name']))   ? $_POST['order_name']   :  null;

        if ($order_status == null ||  $id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->update($id, $order_status);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;
        $id  = (isset($_POST['id'])    && !empty($_POST['id']))   ? $_POST['id']   :  null;

        if ($id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->delete($id);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
}
