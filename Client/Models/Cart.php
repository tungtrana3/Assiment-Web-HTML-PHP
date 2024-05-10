<?php

namespace Models;

use Core\Model;

class cart extends Model
{
    // public $parent_cart_id;
    public $image;
    public $cart_name;
    public $is_active;

    public function __construct()
    {
        $this->image = '';
        $this->cart_name = '';
        $this->is_active = true;
        // $this->parent_cart_id = 0;
    }
    public function createCart($user_id)
    {
        $Query =  "INSERT INTO `cart`( `id`,`user_id`)
        VALUES (NULL,'$user_id');";
        return $this->UpdateRow($Query, [], true);
    }
    public function getCart($user_id)
    {
        $Query = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
        $data = $this->SelectRow($Query);
        $cart_id = $data[0]['id'];
        $Query = "SELECT * FROM shopping_cart_item WHERE `cart_id` = '$cart_id' AND `delete_at` IS NULL ";
        return $this->SelectRow($Query);
    }
    public function getProductName($id)
    {
        $Query = "SELECT * FROM product WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }
    public function addToCart($cart_id, $product_item_id, $quan)
    {
        $Query =   "INSERT INTO `shopping_cart_item`(`id`, `cart_id`, `product_item_id`, `quanty`, `delete_at`, `ordered_at`) 
        VALUES (NULL,'$cart_id',true,'$product_item_id','$quan', NULL, NULL);";

        return $this->InsertRow($Query, [], true);
    }
    public function updatecart($id,  $quanty, $product_item_id)
    {
        $Query = "UPDATE `shopping_cart_item` SET `product_item_id`=$product_item_id,`quanty`='$quanty' WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
    public function delete($id)
    {
        $Query =  "UPDATE `shopping_cart_item` SET `delete_at`=current_timestamp  WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
    public function ordered($id)
    {
        $Query =  "UPDATE `shopping_cart_item` SET `ordered_at`=current_timestamp  WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
