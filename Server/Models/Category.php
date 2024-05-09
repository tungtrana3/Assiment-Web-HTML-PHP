<?php

namespace Models;

use Core\Model;

class Category extends Model
{
    // public $parent_category_id;
    public $image;
    public $category_name;
    public $is_active;

    public function __construct()
    {
        $this->image = '';
        $this->category_name = '';
        $this->is_active = true;
        // $this->parent_category_id = 0;
    }
    public function getCategory($category_name, $is_active)
    {
        $Query = "SELECT * FROM category WHERE category_name LIKE '%$category_name%' && is_active LIKE '%$is_active%'";
        return $this->SelectRow($Query);
    }
    public function addCategory($category_name, $image)
    {
        $Query =  "INSERT INTO `category`( `id`,`category_name`, `is_active`, `image`) 
        VALUES (NULL,'$category_name',true,'$image');";
        return $this->InsertRow($Query, [], true);
    }
    public function updateCategory($id, $category_name, $image, $is_active)
    {
        $Query = "UPDATE `category` SET `category_name`='$category_name',`is_active`=$is_active,`image`='$image' WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
