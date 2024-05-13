<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>

<div class="hero-wrap hero-bread" style="background-image: url('../../public/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/"> <span>Sản phẩm</span></p>
                <h1 class="mb-0 bread">Danh sách sản phẩm</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="/product?category_id=" class="<?= (!isset($_GET['category_id'])) ? 'active' : '' ?>">All</a></li>
                    <?php foreach ($category['data'] as $cate) : ?>
                        <li><a class="<?= (isset($_GET['category_id']) && $cate['id'] == $_GET['category_id']) ? 'active' : '' ?>" href="?category_id=<?= $cate['id'] ?>"><?= $cate['category_name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php foreach ($products['data'] as $pro) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="/product-single?id=<?= $pro['id'] ?>" class="img-prod">
                        <img class="img-fluid" src="<?= $pro['product_image'] ?>" alt="No Image">
                            
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#"><?= $pro['name'] ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc"><?= $pro['price'] ?></span><span class="price-sale"><?= $pro['price'] ?></span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <?php
                        $page = isset($_GET['page']) && $_GET['page'] > 0 ?  $_GET['page'] : 1;
                        $i = $page > 2 ?  $page - 2 : 1;
                        for ($i; $i <=  $page + 2; $i++) {
                            $query = $_GET;
                            $query['page'] = $i;
                            $query_result = http_build_query($query);
                            $href = 'http://' . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?' . $query_result;
                            if ($page == $i) { ?>
                                <li class="active">
                                    <a href="<?php echo $href ?>"><?= $i ?></a>
                                </li>
                            <?php } else if (count($products['data']) > 0 || $i < $page) { ?>
                                <li class="page-item">
                                    <a href="<?php echo $href ?>"><?= $i ?></a>
                                </li>
                            <?php }; ?>
                        <?php }; ?>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>