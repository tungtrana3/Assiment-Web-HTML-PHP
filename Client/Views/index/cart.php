<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>
<div class="hero-wrap hero-bread" style="background-image: url('../../public/images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-0 bread">Giỏ hàng</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Tổng</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 0; $i < count($Carts); $i++) { ?>
								<tr class="text-center">
									<td class="product-remove delete" data-id="<?php echo $Carts[$i]['id']; ?>"><a href="#"><span class="ion-ios-close"></span></a></td>
									<td class="image-prod">
										<div class="img" style="background-image:url(<?= $Carts[$i]['product_image'] ?>);"></div>
									</td>
									<td class="product-name">
										<h3><?= $Carts[$i]['product_name'] ?></h3>
										<p><?= $Carts[$i]['description'] ?></p>
									</td>
									<td class="price">
										<p id="price" name="price"><?= $Carts[$i]['product_price'] ?></p>
										<!-- <input id="price" name="price" disabled value="<?= $Carts[$i]['product_price'] ?>"></input> -->
									</td>
									<td class="quantity">
										<div class="input-group mb-3">
											<button type="button" class=" quantity-right-plus btn btn-outline-primary" data-id="<?php echo $Carts[$i]['id']; ?>">+</button>
											<input id="quantity" name="quanty" type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100" value="<?= $Carts[$i]['quanty'] ?>"></input>
											<button type="button" class=" quantity-left-minus btn btn-outline-primary" data-id="<?php echo $Carts[$i]['id']; ?>">-</button>
										</div>
									</td>
									<td class="total">
										<p id="total" name="total"><?= $Carts[$i]['total'] ?></p>
										<!-- <input id="total" name="total" disabled value="<?= $Carts[$i]['total'] ?>"></input> -->
									</td>
								</tr>
							<?php }; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Địa chỉ giao hàng</h3>
					<form action="#" class="info">
						<div class="form-group">
							<label for="">Tỉnh/Thành phố</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
						<div class="form-group">
							<label for="country">Quận/Huyện</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
						<div class="form-group">
							<label for="country">Số nhà, Đường</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
						<div class="form-group">
							<label for="country">Ghi chú giao hàng</label>
							<input type="text" class="form-control text-left px-3" placeholder="">
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<p class="d-flex">
						<span>Giá trị đơn hàng</span>
						<span>500 000 VND</span>
					</p>
					<p class="d-flex">
						<span>Thuế VAT</span>
						<span>50 000 VND</span>
					</p>
					<p class="d-flex">
						<span>Giảm giá</span>
						<span>5000 VND</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Số tiền phải thanh toán</span>
						<span>545 000 VND</span>
					</p>
				</div>
				<p><a href="/order" class="btn btn-primary py-3 px-4">Đặt hàng</a></p>
			</div>
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
			var price = parseInt($('#price').text());
			$('#quantity').val(quantity + 1);
			$('#total').text(price * (quantity + 1));
		});
		$('.quantity-left-minus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			var price = parseInt($('#price').text());
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
				$('#total').text(price * (quantity - 1));
			}
		});
	});
</script>