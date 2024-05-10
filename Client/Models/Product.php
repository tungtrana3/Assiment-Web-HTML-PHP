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
    public function getCategory($page, $size, $search, $is_active)
    {
        $offset = $page * $size - $size;
        $Query = "SELECT * FROM category WHERE category_name LIKE '%$search%' AND   `delete_at` IS NULL LIMIT $size OFFSET $offset";
        return $this->SelectRow($Query);
    }
    public function getProduct($page, $size, $search, $is_active, $category_id)
    {
        $offset = $page * $size - $size;
        $Query = "SELECT * FROM product WHERE `name` LIKE '%$search%'  AND `category_id` LIKE '%$category_id%'
        AND `delete_at` IS NULL LIMIT $size OFFSET $offset";
        return $this->SelectRow($Query);
    }
    public function addproduct($category_id, $product_name, $description, $product_image,  $quan,  $price, $is_active)
    {
        $Query =  "INSERT INTO `product`( `id`,`category_id`, `name`, `description`,`product_image`,`quan`,`price`,`is_active`) 
        VALUES (NULL,'$category_id','$product_name','$description','$product_image','$quan','$price',true);";
        return $this->InsertRow($Query, [], true);
    }
    public function updateproduct($id, $category_id, $product_name, $description, $product_image,  $quan,  $price, $is_active)
    {
        $Query = "UPDATE `product` SET `category_id`='$category_id',
        `name`='$product_name',
        `description`='$description',
        `product_image`='$product_image',
        `quan`='$quan',
        `price`='$price',
        `is_active`=$is_active WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
    public function delete($id)
    {
        $Query =  "UPDATE `product` SET `delete_at`=current_timestamp  WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
