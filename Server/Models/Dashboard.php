<?php

namespace Models;

use Core\Model;

class Dashboard extends Model
{
    // public $parent_Dashboard_id;
    public $image;
    public $Dashboard_name;
    public $is_active;

    public function __construct()
    {
        $this->image = '';
        $this->Dashboard_name = '';
        $this->is_active = true;
        // $this->parent_Dashboard_id = 0;
    }
    public function getDashboard($page, $size, $search, $is_active)
    {
        $offset = $page * $size - $size;
        $Query = "SELECT * FROM Dashboard WHERE Dashboard_name LIKE '%$search%' AND   `delete_at` IS NULL LIMIT $size OFFSET $offset";
        return $this->SelectRow($Query);
    }
}
