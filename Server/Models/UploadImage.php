<?php

namespace Models;

use Core\Model;

class UploadImage extends Model
{
    public $image;
    public $category_name;
    public $is_active;

    public function __construct()
    {
        $this->image = '';
        $this->category_name = '';
        $this->is_active = true;
    }
    public function addImage($category_name, $image)
    {
        $Query =  "INSERT INTO `image`( `id`,`url`, `size`, `image`) 
        VALUES (NULL,'$category_name',true,'$image');";
        return $this->InsertRow($Query, [], true);
    }
}
