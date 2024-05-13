<?php $Title = "Autumn Shop" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>
<?php require_once __DIR__ . "/../layouts/navigation.php"; ?>
<div class="hero-wrap hero-bread" style="background-image: url('../../public/images/bg_2.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Đơn hàng</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <h5 class="card-header">Danh sách đơn hàng</br>

                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Mã đơn</th>
                                    <th>Người nhận</th>
                                    <th>Địa chỉ</br> giao hàng</th>
                                    <th>Phương thức </br>vận chuyển</th>
                                    <th>Phương thức</br> thanh toán</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <tbody>
                                        <?php for ($i = 0; $i < count($Orders); $i++) { ?>
                                            <tr>
                                                <td><?= $Orders[$i]['id'] ?></td>
                                                <td><?= $Orders[$i]['user'] ?></td>
                                                <td><?= $Orders[$i]['shipping_address'] ?></td>
                                                <td><?= $Orders[$i]['shipping_method'] ?></td>
                                                <td><?= $Orders[$i]['payment_method'] ?></td>
                                                <td><?= $Orders[$i]['order_date'] ?></td>
                                                <td><?= $Orders[$i]['order_total'] ?></td>
                                                <td><?= $Orders[$i]['order_status'] ?></td>
                                                <td>
                                                    <button type="button" class=" edit btn btn-outline-primary" data-id="<?php echo $Orders[$i]['id']; ?>" data-bs-toggle="modal" data-bs-target="#basicModal">Xem</button>
                                            </tr>
                                        <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>