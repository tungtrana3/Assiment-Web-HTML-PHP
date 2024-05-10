<?php

namespace Controllers;

class Index extends \Core\BaseController
{
    protected string $Model = "Dashboard";
    public function index()
    {
        // $Users = $this->Database->getUsers();
        // $Users = array('items' => $Users);
        // view('index/index', compact('Users'));
        view('index/index');
    }
}
