<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>


<div class="hero-wrap hero-bread" style="background-image: url('../../public/images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="/"> <span class="mr-2"><a href="/">Sản phẩm</a></span> <span>Chi tiết sản phẩm</span></p>
				<h1 class="mb-0 bread">Chi Tiết Sản Phấm</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="./../public/images/product-1.jpg" class="image-popup"><img src="<?= $product['data'][0]['product_image'] ?>" class="img-fluid" alt="No Image"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?= $product['data'][0]['name'] ?></h3>
				<input type="text" id="product_id" hidden name="product_id"  value="<?= $product['data'][0]['id'] ?>">

				<p class="price"><span> <?= $product['data'][0]['price']  ?> VND </span></p>
				<p><?= $product['data'][0]['description'] ?></p>
				</p>
				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" id="" class="form-control">
									<option value="">Nhỏ</option>
									<option value="">Vừa</option>
									<option value="">Lớn</option>
									<option value="">Ngoại cỡ</option>
								</select>
							</div>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>
						<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<p style="color: #000;">Còn lại <?= $product['data'][0]['quan'] ?> sản phẩm</p>
					</div>
				</div>
				<p><a id='add-to-cart' class="btn btn-black py-3 px-5">Thêm vào giỏ hàng</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Sản phẩm</span>
				<h2 class="mb-4">Sản phẩm liên quan</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam</p>
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
							<h3><a href="#"><?= $pro['name'] ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span class="mr-2 price-dc"><?= $pro['price'] ?></span><span class="price-sale"><?= $pro['price'] ?></span></p>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="#" id='add-to-cart' class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>

<script>
	$(document).ready(function() {
		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			$('#quantity').val(quantity + 1);
		});

		$('.quantity-left-minus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});
		$('#add-to-cart').click(function(e) {
			e.preventDefault();
			var quan = parseInt($('#quantity').val());
			var product_id = $('#product_id').val();
			var cart_id = $('#cart_id').val();

			data = {
                quan: quan,
				cart_id: '1',
				product_id: product_id
              }
              $.ajax({
                type: 'POST',
                url: 'http://localhost:8080/api/cart/add-to-cart',
				// headers:{
				// 	"Access-Control-Allow-Origin": '*',
				// 	"Content-Type": "application/x-www-form-urlencoded",
				// },
                data: data,
                success: function(res) {
                  alert('Thêm thành công');
                  $('#smaill').click();
                  location.reload()
                },
                error: function(res) {
                  alert('Thêm khong thành công');
                //   alert(JSON.parse(res.responseText).msg);
                }
              });

			// $.ajax({
			// 	type: 'POST',
			
			// 	url: 'http://172.16.1.157:8080/api/cart/add-to-cart',
			// 	data: "quan=" + quan + "&cart_id=" + 1 + "&product_id=" + product_id,
			// 	success: function(res) {
			// 		alert('Thêm Sản phẩm thành công');
			// 	},
			// 	error: function(res) {
			// 		alert('Thêm Sản phẩm không thành công');
			// 	}
			// });
		});
	});
</script>
</body>

</html>