<?php

namespace Models;

use Core\Model;

class Order extends Model
{
    public $order_name;

    public function __construct()
    {
        $this->order_name = '';
    }
    public function getorder($page, $size, $search, $is_active, $order_status)
    {
        $offset = $page * $size - $size;
        $Query = "SELECT * FROM `order` WHERE `shipping_address` LIKE '%$search%' AND `order_status` = '$order_status'  AND `delete_at` IS NULL LIMIT $size OFFSET $offset";
        return $this->SelectRow($Query);
    }
    public function getShippingMethod($id)
    {
        $Query = "SELECT * FROM `shipping_method` WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }
    public function getPaymentMethod($id)
    {
        $Query = "SELECT * FROM `payment_type` WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }
    public function getAddress($id)
    {
        $Query = "SELECT * FROM `address` WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }
    public function getUser($id)
    {
        $Query = "SELECT email_address FROM `user` WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }
    public function getOrderStatus($id)
    {
        $Query = "SELECT * FROM `order_status` WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }
    public function getOrderLine($id)
    {
        $Query = "SELECT email_address FROM `user` WHERE `id` = '$id'";
        return $this->SelectRow($Query);
    }

    public function add($user_id, $shipping_address, $shipping_method, $order_total, $order_status, $payment_method_id)
    {
        $Query =  "INSERT INTO INSERT INTO `order`(`id`, `user_id`, `order_date`, `payment_method_id`, `shipping_address`,
         `shipping_method`, `order_total`, `order_status`, `delete_at`) 
       VALUES (NULL,'$user_id',current_timestamp,'$payment_method_id','$shipping_address',
       '$shipping_method','$order_total','$order_status',NULL)";
        return $this->InsertRow($Query, [], true);
    }
    public function update($id, $order_status)
    {
        $Query = "UPDATE `order` SET `order_status`='$order_status' WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
    public function delete($id)
    {
        $Query =  "UPDATE `order` SET `delete_at`=current_timestamp  WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
