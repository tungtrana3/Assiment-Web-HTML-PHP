<?php

namespace Controllers;

use Models\Product;

class ProductController extends \Core\BaseController
{
    protected string $Model = "Product";

    public function getProduct()
    {
        $name  = (isset($_GET['name'])    && !empty($_GET['name']))   ? $_GET['name']   :  '';
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? $_GET['is_active']   :  '';
        $category_id  = (isset($_GET['category_id'])    && !empty($_GET['category_id']))   ? $_GET['category_id']   :  '';

        $data = $this->Database->getProduct($name, $is_active, $category_id);
        $result = array('data' => $data);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;

        $product_name  = (isset($_POST['product_name'])    && !empty($_POST['product_name']))   ? $_POST['product_name']   :  null;
        $category_id  = (isset($_POST['category_id'])    && !empty($_POST['category_id']))   ? $_POST['category_id']   :  null;
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  null;
        $product_thumbnail  = (isset($_POST['product_thumbnail'])    && !empty($_POST['product_thumbnail']))   ? $_POST['product_thumbnail']   :  null;
        $product_image  = (isset($_POST['product_image'])    && !empty($_POST['product_image']))   ? $_POST['product_image']   :  null;

        if ($product_name == null || $category_id == null || $description == null || $product_thumbnail == null || $product_image == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ.");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }


        $result = $this->Database->addProduct($category_id, $product_name, $description, $product_thumbnail, $product_image);

        $result = array('data' => $result);

        $this->Database->sendResponse(200, json_encode($result));
    }
    public function updateProduct()
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
        $msg = null;

        $product_name  = (isset($_POST['product_name'])    && !empty($_POST['product_name']))   ? $_POST['product_name']   :  null;
        $category_id  = (isset($_POST['category_id'])    && !empty($_POST['category_id']))   ? $_POST['category_id']   :  null;
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  null;
        $product_thumbnail  = (isset($_POST['product_thumbnail'])    && !empty($_POST['product_thumbnail']))   ? $_POST['product_thumbnail']   :  null;
        $product_image  = (isset($_POST['product_image'])    && !empty($_POST['product_image']))   ? $_POST['product_image']   :  null;
        $is_active  = (isset($_POST['is_active'])    && !empty($_POST['is_active']))   ? $_POST['is_active']   :  true;
        
        if ($product_name == null || $category_id == null || $description == null || $product_thumbnail == null || $product_image == null || $id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ.");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }

        $result = $this->Database->updateProduct($id, $category_id, $product_name, $description, $product_thumbnail, $product_image, $is_active);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
}
