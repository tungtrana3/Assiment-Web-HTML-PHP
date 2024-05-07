<?php

namespace Controllers;

class Index extends \Core\BaseController
{
    protected string $Model = "Users";
    public function index()
    {
        $Users = $this->Database->getUsers();
        $result = array('items' => $Users);
        view('index/index' , compact('Users'));
    }
}
