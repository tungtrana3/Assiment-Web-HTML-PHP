<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>

<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(../../public/images//bg_1.jpg);">
            <div class="overlay"></div>
        </div>
        <div class="slider-item" style="background-image: url(../../public/images//bg_2.jpg);">
            <div class="overlay"></div>
        </div>
    </div>
</section>
<?php require_once __DIR__ . "/../layouts/medal.php"; ?>
<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Danh sách loại sản phẩm</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php for ($i = 0; $i < 2; $i++) { ?>
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?= $category['data'][$i]['image'] ?>);">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="product?category_id=<?= $category['data'][$i]['id'] ?>"><?= $category['data'][$i]['category_name'] ?></a></h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <?php for ($i = 2; $i < 4; $i++) { ?>
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?= $category['data'][$i]['image'] ?>);">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="product?category_id=<?= $category['data'][$i]['id'] ?>"><?= $category['data'][$i]['category_name'] ?></a></h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-4">
                <?php for ($i = 4; $i < 6; $i++) { ?>
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(<?= $category['data'][$i]['image'] ?>);">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="product?category_id=<?= $category['data'][$i]['id'] ?>"><?= $category['data'][$i]['category_name'] ?></a></h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Top sản phẩm bán chạy</span>
                <h2 class="mb-4">Danh sách sản phẩm</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($products['data'] as $pro) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="/product-single?id=<?= $pro['id'] ?>" class="img-prod">
                            <img class="img-fluid" src="<?= $pro['product_image'] ?>" alt="No Image">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="product?category_id=<?= $category['data'][$i]['id'] ?>"><?= $pro['name'] ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc"><?= $pro['price'] ?></span><span class="price-sale"><?= $pro['price'] ?></span></p>
                                </div>
                            </div>
                            <!-- <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="product?category_id=<?= $category['data'][$i]['id'] ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ftco-section img" style="background-image: url(../../public/images//bg_3.jpg);">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">Chương trình khuyến mãi</span>
                <h2 class="mb-4">Mua hàng giá sốc</h2>
                <p>Thịt cá rau củ quả giảm giá 30% khi mua sau 17h30, hoá đơn trên 100k được tặng kèm 1kg rau sạch</p>
                <h3><a href="product?category_id=<?= $category['data'][$i]['id'] ?>">Thịt heo nạc giá sốc</a></h3>
                <span class="price">100k <a href="product?category_id=<?= $category['data'][$i]['id'] ?>">giảm còn 60k</a></span>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . "/../layouts/customer-review.php"; ?>
<?php require_once __DIR__ . "/../layouts/footer.php"; ?>