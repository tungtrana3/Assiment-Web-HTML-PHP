<?php

namespace Controllers;

use Models\Category;

class CategoryController extends \Core\BaseController
{
    protected string $Model = "Category";

    public function getCategory()
    {
        $name  = (isset($_GET['name'])    && !empty($_GET['name']))   ? $_GET['name']   :  '';
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? $_GET['is_active']   :  '';

        $data = $this->Database->getCategory($name, $is_active);
        $result = array('data' => $data);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;

        $image  = (isset($_POST['image'])    && !empty($_POST['image']))   ? $_POST['image']   :  null;
        $category_name  = (isset($_POST['category_name'])    && !empty($_POST['category_name']))   ? $_POST['category_name']   :  null;

        if ($category_name == null || $image == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->addCategory($category_name, $image);

        $result = array('data' => $result);

        $this->Database->sendResponse(200, json_encode($result));
    }
    public function updateCategory()
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
        $category_name  = (isset($_POST['category_name'])    && !empty($_POST['category_name']))   ? $_POST['category_name']   :  null;
        $is_active  = (isset($_POST['is_active'])    && !empty($_POST['is_active']))   ? $_POST['is_active']   :  true;

        if ($category_name == null || $image == null || $id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        
        $result = $this->Database->updateCategory($id, $category_name, $image, $is_active);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
}
