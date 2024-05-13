<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>

<div class="hero-wrap hero-bread" style="background-image: url('../../public/images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-0 bread">Liên hệ</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Địa chỉ:</span> 268 Lý Thường Kiệt, Phường 14, Quận 10 , Thành phố Hồ Chí Minh , Việt Nam</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Số điện thoại:</span> <a href="tel://0123456789">+ 123 456 789</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Email:</span> <a href="mailto:autumn@gmail.com">autumn@gmail.com</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Website</span> <a href="/">autumn.com</a></p>
        </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form action="#" class="bg-white p-5 contact-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên của bạn">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Email của bạn">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tiêu đềd">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Nội dung góp ý"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Gửi góp ý" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>

      <div class="col-md-6 d-flex">
        <div id="map" class="bg-white"></div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>