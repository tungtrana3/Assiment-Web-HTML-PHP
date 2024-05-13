<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>

<div class="hero-wrap hero-bread" style="background-image: url('../../public/images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-0 bread">Blog</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">

      <div class="col-lg-12 sidebar ftco-animate ">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon ion-ios-search"></span>
              <input type="text" class="form-control" placeholder="Tìm kiếm...">
            </div>
          </form>
        </div>
        <?php for ($i = 1; $i < 10; $i++) { ?>
          <div class="col-lg-12 ftco-animate">
            <div class="row">
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="/blog-single" class="block-20" style="background-image: url('https://i.pinimg.com/564x/48/a8/da/48a8daeebcad1e9cb05877cfe086288c.jpg');"></a>
                  <div class="text d-block pl-md-4">
                    <div class="meta mb-3">
                      <div><a href="#">May 20, 2024</a></div>
                      <div><a href="#">Admin</a></div>
                      <div><a href="#" class="meta-chat"><span class="icon-chat"></span> <?= $i + 1 ?></a></div>
                    </div>
                    <h3 class="heading"><a href="#">Cuối tuần vào bếp với món mực lụi nướng sả thơm lừng, giòn ngon</a></h3>
                    <p>Mực lụi nướng sả có hương vị rất đặc biệt, khiến ai thử qua sẽ không bao giờ quên, bởi hương thơm nứt mũi, đặc biệt của sả có trong món ăn này. Cuối tuần này, nếu bạn chưa biết nấu món gì ngon cho cả gia đình thì hãy thử làm ngay món mực lụi nướng sả thơm lừng này, đảm bảo cả nhà đều mê.</p>
                    <p><a href="/blog-single" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
</section> <!-- .section -->

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>