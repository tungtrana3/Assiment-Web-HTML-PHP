<?php

namespace Models;

use Core\Model;

class Product extends Model
{
    // public $parent_product_id;
    public $image;
    public $product_name;
    public $is_active;

    public function __construct()
    {
        $this->image = '';
        $this->product_name = '';
        $this->is_active = true;
        // $this->parent_product_id = 0;
    }
    public function getproduct($product_name, $is_active, $category_id)
    {
        $Query = "SELECT * FROM product WHERE `name` LIKE '%$product_name%' && is_active LIKE '%$is_active%' && category_id LIKE '%$category_id%' ";
        return $this->SelectRow($Query);
    }
    public function addproduct($category_id, $product_name, $description, $product_thumbnail, $product_image)
    {
        $Query =  "INSERT INTO `product`( `id`,`category_id`, `name`, `description`, `product_thumbnail`, `product_image`,`is_active`) 
        VALUES (NULL,'$category_id','$product_name','$description','$product_thumbnail','$product_image',true);";
        return $this->InsertRow($Query, [], true);
    }
    public function updateproduct($id, $category_id, $product_name, $description, $product_thumbnail, $product_image, $is_active)
    {
        $Query = "UPDATE `product` SET `category_id`='$category_id',`name`='$product_name',`description`='$description',`product_thumbnail`='$product_thumbnail',`product_image`='$product_image',`is_active`=$is_active WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
