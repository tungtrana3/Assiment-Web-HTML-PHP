<?php

namespace Controllers;

use Models\Users;

class UserController extends \Core\BaseController
{
    protected string $Model = "Users";

    public function index()
    {
        $Users = $this->Database->getUsers(1, 20, '');
        $result = array('items' => $Users);
        view('index/index', compact('Users'));
    }
    public function show()
    {
        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';
        $Users = $this->Database->getUsers($page, $size, $search);
        view('account/list-account', compact('Users'));
    }
    public function login()
    {
        view('account/login');
    }
    public function register()
    {
        view('account/register');
    }
    public function forgotPwd()
    {
        view('account/forgotPassword');
    }
    public function getUsers()
    {
        $Users = $this->Database->getUsers();
        $result = array('items' => $Users);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;
        $email_address  = (isset($_POST['email_address'])    && !empty($_POST['email_address']))   ? $_POST['email_address']   :  null;
        $phone_number  = (isset($_POST['phone_number'])    && !empty($_POST['phone_number']))   ? $_POST['phone_number']   :  null;
        $password  = (isset($_POST['password'])    && !empty($_POST['password']))   ? $_POST['password']   :  null;
        $isAdmin  = (isset($_POST['isAdmin'])    && !empty($_POST['isAdmin']))   ? $_POST['isAdmin']   :  false;

        if ($email_address == null || $phone_number == null || $password == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ 123");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $msg = "Email không hợp lệ";
        }

        $isExits = $this->Database->getUsersByEmail($email_address);
        if (count($isExits) > 0) {
            $msg = "Email is exits";
        }
        $isExits = $this->Database->getUsersByPhone($phone_number);
        if (count($isExits) > 0) {
            $msg = "Phone number is exits";
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->addUser($email_address, $phone_number, $password, $isAdmin);

        $result = array('data' => $result);

        $this->Database->sendResponse(200, json_encode($result));
    }
    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            return $this->Database->sendResponse(405);
        }
        $msg = null;
        $id  = (isset($_POST['id'])    && !empty($_POST['id']))   ? $_POST['id']   :  null;
        $email_address  = (isset($_POST['email_address'])    && !empty($_POST['email_address']))   ? $_POST['email_address']   :  null;
        $phone_number  = (isset($_POST['phone_number'])    && !empty($_POST['phone_number']))   ? $_POST['phone_number']   :  null;
        $password  = (isset($_POST['password'])    && !empty($_POST['password']))   ? $_POST['password']   :  null;
        $isAdmin  = (isset($_POST['isAdmin'])  && !empty($_POST['isAdmin'])) ? '1'  :  '0';
        $is_active  = (isset($_POST['is_active'])  && !empty($_POST['is_active'])) ? '1'  :  '0';

        if ($id == null) {
            $msg = array('msg' => "Dữ liệu không hợp lệ");
            return $this->Database->sendResponse(400, json_encode($msg));
        }
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $msg = "Email không hợp lệ";
        }

        $user = $this->Database->getUsersById($id);

        $isExits = $this->Database->getUsersByEmail($email_address);
        if (count($isExits) > 0 &&  $user[0]['email_address'] != $email_address) {
            $msg = "Email is exits";
        }
        $isExits = $this->Database->getUsersByPhone($phone_number);
        if (count($isExits) > 0 &&  $user[0]['phone_number'] != $phone_number) {
            $msg = "Phone number is exits";
        }

        if (count($user) > 0) {
            $email_address = ($email_address != null) ? $email_address : $user[0]['email_address'];
            $phone_number = ($phone_number != null) ? $phone_number : $user[0]['phone_number'];
            $isAdmin = ($isAdmin != null) ? $isAdmin : $user[0]['isAdmin'];
            $password = ($password != null) ? $password : $user[0]['password'];
        }
        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        }
        $result = $this->Database->updateUser($id, $email_address, $phone_number, $password, $isAdmin, $is_active);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
    public function deleteUser()
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
        $result = $this->Database->deleteUser($id);

        $result = array('data' => $result);
        $this->Database->sendResponse(200, json_encode($result));
    }
}
