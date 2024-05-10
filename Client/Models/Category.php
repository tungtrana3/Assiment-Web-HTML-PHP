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
    public function getCategory($page, $size, $search, $is_active)
    {
        $offset = $page * $size - $size;
        $Query = "SELECT * FROM category WHERE category_name LIKE '%$search%' AND   `delete_at` IS NULL LIMIT $size OFFSET $offset";
        return $this->SelectRow($Query);
    }
    public function addCategory($category_name, $image, $description)
    {
        $Query =  "INSERT INTO `category`( `id`,`category_name`, `is_active`, `image`, `description`) 
        VALUES (NULL,'$category_name',true,'$image','$description');";
        return $this->InsertRow($Query, [], true);
    }
    public function updateCategory($id, $category_name, $image, $is_active, $description)
    {
        $Query = "UPDATE `category` SET `category_name`='$category_name',`is_active`=$is_active,`image`='$image', `description`='$description' WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
    public function delete($id)
    {
        $Query =  "UPDATE `category` SET `delete_at`=current_timestamp  WHERE id = '$id'";
        return $this->UpdateRow($Query, [], true);
    }
}
