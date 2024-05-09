<?php

namespace Controllers;

use Models\Category;

class CategoryController extends \Core\BaseController
{
    protected string $Model = "Category";

    public function show()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $is_active  = (isset($_GET['is_active'])    && !empty($_GET['is_active']))   ? '1'   :  '0';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $Categorys = $this->Database->getCategory($page, $size, $search, $is_active);

        view('product/list-category', compact('Categorys'));
    }
    public function getCategory()
    {
        $name  = (isset($_GET['name'])    && !empty($_GET['name']))   ? $_GET['name']   :  '';
        $is_active  = (isset($_POST['is_active'])  && !empty($_POST['is_active'])) ? '1'  :  '0';

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
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  null;
        $category_name  = (isset($_POST['category_name'])    && !empty($_POST['category_name']))   ? $_POST['category_name']   :  null;

        if ($category_name == null || $image == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->addCategory($category_name, $image, $description);

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
        $is_active  = (isset($_POST['is_active'])  && !empty($_POST['is_active'])) ? '1'  :  '0';
        $description  = (isset($_POST['description'])    && !empty($_POST['description']))   ? $_POST['description']   :  '';

        if ($category_name == null || $image == null || $id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }

        $result = $this->Database->updateCategory($id, $category_name, $image, $is_active, $description);

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
