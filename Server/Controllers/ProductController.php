<?php

namespace Controllers;

use Models\Product;

class ProductController extends \Core\BaseController
{
    protected string $Model = "Product";

    public function show()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $category_id  = (isset($_GET['category_id'])  && !empty($_GET['category_id']))   ? $_GET['category_id']   :  '';
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? '0'   :  '1';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $Products = $this->Database->getProduct($page, $size, $search, $is_active, $category_id);
        $Categorys = $this->Database->getCategory(1, 100, '', '1');
        
        view('product/list-product', compact('Products', 'Categorys'));
    }
    public function getProduct()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $category_id  = (isset($_GET['category_id'])    && !empty($_GET['category_id']))   ? $_GET['category_id']   :  '';
        $is_active  = (isset($_GET['is_active']) && !empty($_GET['is_active'])) ? '1'   :  '0';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $data = $this->Database->getProduct($page, $size, $search, $is_active, $category_id);
        $result = array('data' => $data);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function getById()
    {
        $id  = (isset($_GET['id'])    && !empty($_GET['id']))   ? $_GET['id']   :  1;

        $data = $this->Database->getProductById($id);
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
        $product_image  = (isset($_POST['product_image'])    && !empty($_POST['product_image']))   ? $_POST['product_image']   :  null;
        $quan  = (isset($_POST['quan'])    && !empty($_POST['quan']))   ? $_POST['quan']   :  0;
        $price  = (isset($_POST['price'])    && !empty($_POST['price']))   ? $_POST['price']   :  0;
        $is_active  = (isset($_POST['is_active'])    && !empty($_POST['is_active']))   ? '1'   :  '0';
        
        if ($product_name == null || $quan == null || $price == null || $category_id == null || $description == null ||  $product_image == null ) {
            $msg = array('msg' => "Dữ liệu không hợp lệ.");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }

        $result = $this->Database->addProduct($category_id, $product_name, $description, $product_image,  $quan,  $price, $is_active);

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

        $id  = (isset($_POST['id'])    && !empty($_POST['id']))   ? $_POST['id']   :  null;
        $msg = null;
        $product_name  = (isset($_POST['product_name'])    && !empty($_POST['product_name']))   ? $_POST['product_name']   :  null;
        $category_id  = (isset($_POST['category_id'])    && !empty($_POST['category_id']))   ? $_POST['category_id']   :  null;
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  null;
        // $product_thumbnail  = (isset($_POST['product_thumbnail'])    && !empty($_POST['product_thumbnail']))   ? $_POST['product_thumbnail']   :  null;
        $product_image  = (isset($_POST['product_image'])    && !empty($_POST['product_image']))   ? $_POST['product_image']   :  null;
        $quan  = (isset($_POST['quan'])    && !empty($_POST['quan']))   ? $_POST['quan']   :  0;
        $price  = (isset($_POST['price'])    && !empty($_POST['price']))   ? $_POST['price']   :  0;
        $is_active  = (isset($_POST['is_active'])    && !empty($_POST['is_active']))   ? '1'   :  '0';

        if ($product_name == null || $quan == null || $price == null || $category_id == null || $description == null ||  $product_image == null || $id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ.");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }

        $result = $this->Database->updateProduct($id, $category_id, $product_name, $description, $product_image,  $quan,  $price, $is_active);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;
        $id  = (isset($_POST['id'])   && !empty($_POST['id']))   ? $_POST['id']   :  null;

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
