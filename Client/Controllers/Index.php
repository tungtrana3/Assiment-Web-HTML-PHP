<?php

namespace Controllers;

class Index extends \Core\BaseController
{
    protected string $Model = "Dashboard";
    public function index()
    {
        $server = 'http://localhost:8080/api';
        $data = callGETApi($server . '/product/getAll');
        $category = callGETApi($server . '/category/getAll');

        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $category_id  = (isset($_GET['category_id'])    && !empty($_GET['category_id']))   ? $_GET['category_id']   :  '';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $url_product = $server . '/product/getAll?page=' . $page . '&size=' . $size . '&search=' . $search . '&category_id=' . $category_id . '';
        $res_product = callGETApi($url_product);
        $category = json_decode($category, true);
        $products = json_decode($res_product, true);

        view('index/index', compact('data', 'category', 'products'));
    }
    public function cart()
    {
        $server = 'http://localhost:8080/api';
        $user_id  = (isset($_GET['user_id'])    && !empty($_GET['user_id']))   ? $_GET['user_id']   :  '1';

        $data = callGETApi($server . '/cart/getAll?user_id=' . $user_id);
        $data = json_decode($data, true);
        $Carts = array();
        foreach ($data['data'] as $elem) {
            $url_product = $server . '/product/getname?id=' . $elem['product_item_id'];
            $res_product = callGETApi($url_product);

            $products = json_decode($res_product, true);

            $product = $products['data'][0];
            $elem_format = array(
                "id" => $elem['id'],
                "quanty" => $elem['quanty'],
                "total" => $elem['quanty'] * $product['price'],
                "product_item_id" => $elem['product_item_id'],
                "product_image" => $product['product_image'],
                "product_name" => $product['name'],
                "description" => $product['description'],
                "product_price" => $product['price'],
            );
            array_push($Carts, $elem_format);
        }
        view('index/cart', compact('Carts'));
    }
    public function product()
    {

        $server = 'http://localhost:8080/api';
        $data = callGETApi($server . '/product/getAll');
        $category = callGETApi($server . '/category/getAll');

        $page  = (isset($_GET['page'])    && !empty($_GET['page']))   ? $_GET['page']   :  1;
        $size  = (isset($_GET['size'])    && !empty($_GET['size']))   ? $_GET['size']   :  20;
        $category_id  = (isset($_GET['category_id'])    && !empty($_GET['category_id']))   ? $_GET['category_id']   :  '';
        $search  = (isset($_GET['search'])    && !empty($_GET['search']))   ? $_GET['search']   :  '';

        $url_product = $server . '/product/getAll?page=' . $page . '&size=' . $size . '&search=' . $search . '&category_id=' . $category_id . '';
        $res_product = callGETApi($url_product);
        $category = json_decode($category, true);
        $products = json_decode($res_product, true);

        view('index/products', compact('data', 'category', 'products'));
    }

    public function productSingle()
    {
        $server = 'http://localhost:8080/api';
        $page  =   1;
        $size  = 10;
        $category_id  = '';
        $search  = '';
        $id  = (isset($_GET['id'])    && !empty($_GET['id']))   ? $_GET['id']   :  1;

        $url_product = $server . '/product/getAll?page=' . $page . '&size=' . $size . '&search=' . $search . '&category_id=' . $category_id . '';
        $products = callGETApi($url_product);
        $products = json_decode($products, true);

        $product = callGETApi('http://localhost:8080/api/product/get-by-id?id=' . $id);
        $product = json_decode($product, true);

        view('index/single-product', compact('products', 'product'));
    }
    public function forgotPwd()
    {
        view('index/forgot-password');
    }
    public function login()
    {
        view('index/login');
    }
    public function register()
    {
        view('index/register');
    }
    public function blog()
    {
        view('index/blog');
    }
    public function singleBlog()
    {
        view('index/blog-single');
    }
    public function about()
    {
        view('index/about');
    }
    public function order()
    {

        $server = 'http://localhost:8080/';
        $user_id  = (isset($_GET['user_id'])    && !empty($_GET['user_id']))   ? $_GET['user_id']   :  '1';

        $data = callGETApi($server . 'api/order?user_id=' . $user_id);
        $Orders = json_decode($data, true);
        $Orders = $Orders['data'];
        view('index/order', compact('Orders'));
    }
    public function contact()
    {
        view('index/contact');
    }
}
