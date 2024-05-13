<?php $Title = "Autumn Admin" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->
    <?php require_once __DIR__ . "/../layouts/navigation.php"; ?>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <?php require_once __DIR__ . "/../layouts/search-bar.php"; ?>
      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Giỏ hàng /</span> Danh sách sản phẩm</h4>
          <!-- Modal -->
          <!-- Default Modal -->
          <div class="col-lg-4 col-md-6">
            <div class="mt-3">
              <!-- Button trigger modal -->
              <!--Add Modal -->
              <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Thông tin giao hàng</h5>
                      <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Form Order -->
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Email người nhận</label>
                          <input type="email" class="form-control" name="email_address" placeholder="name@example.com" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Số điện thoại người nhận</label>
                          <input type="phone" class="form-control" name="phone_number" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Phương thức vận chuyển</label>
                          <select class="form-select" name="shipping_method">
                            <option value="1">Nhanh</option>
                            <option value="2">Hoả tốc</option>
                            <option value="3">Thường</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Phương thức thanh toán</label>
                          <select class="form-select" name="payment_method">
                            <option value="1">Thanh toán khi nhận hàng</option>
                            <option value="2">Momo</option>
                            <option value="3">Chuyển khoản ngân hàng</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlSelect2" class="form-label">Địa chỉ giao hàng</label>
                          <select class="form-select" name="address">
                            <option value="1">Địa chỉ 1</option>
                            <option value="2">Địa chỉ 2</option>
                            <option value="3">Địa chỉ 1</option>
                          </select>
                        </div>
                        <div>
                          <label for="exampleFormControlTextarea1" class="form-label">Ghi chú</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="reset" id="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Đóng
                      </button>
                      <button type="submit" class="btn btn-primary">Đặt hàng</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Delete Modal -->
          <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2">Bạn chắc chắn muốn huỷ sản phẩm này?</h5>
                </div>
                <div class="modal-footer">
                  <input class="form-check-input" name="del_id" type="hidden" id="del_id" />
                  <button type="button" id="confirm-delete" name="confirm-delete" class="btn btn-primary">Xác nhận</button>
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Đóng
                  </button>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-3" />
          <!-- Responsive Table -->
          <div class="card">
            <h5 class="card-header">Danh sách sản phẩm</br>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr class="text-nowrap">
                      <th>#</th>
                      <th>Mã SP</th>
                      <th>Tên sản phẩm</th>
                      <th>Hình ảnh</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Tổng</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i = 0; $i < count($Carts); $i++) { ?>
                      <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td><?= $Carts[$i]['product_item_id'] ?></td>
                        <td><?= $Carts[$i]['product_name'] ?></td>
                        <td><img src="<?= $Carts[$i]['product_image'] ?>" onerror="this.src='../../public/assets/img/avatars/1.png'" class="w-px-40 h-px-40" /></td>
                        <td>
                          <button type="button" class=" add-quan btn btn-outline-primary" data-id="<?php echo $Carts[$i]['id']; ?>">+</button>
                          <input id="quanty-<?php echo $Carts[$i]['id']; ?>" name="quanty" type="number" style="width:50px; height:40px" value="<?= $Carts[$i]['quanty'] ?>"></input>
                          <button type="button" class=" minus-quan btn btn-outline-primary" data-id="<?php echo $Carts[$i]['id']; ?>">-</button>
                        </td>
                        <td><?= $Carts[$i]['product_price'] ?></td>
                        <td><?= $Carts[$i]['total'] ?></td>
                        <td>
                          <button type="button" class=" delete btn btn-outline-danger" data-bs-toggle="modal" data-id="<?php echo $Carts[$i]['id']; ?>" data-bs-target="#smallModal">Xoá</button>
                        </td>
                      </tr>
                    <?php }; ?>
                  </tbody>
                </table>
              </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="mt-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">Đặt hàng</button>
            </div>
          </div>
          <!-- / Content -->
          <?php require_once __DIR__ . "/../layouts/footer.php"; ?>
          <script>
            $('#basicModal').on('show.bs.modal', function(e) {
              let id = $('#id').val();
              if (id != undefined && id != '') {
                $('#password').prop("disabled", true);
              } else {
                $('#password').prop("disabled", false);
              }
            })
            $(document).on("click", ".add-quan", function() {
              let id = $(this).data('id')
              // let quan = $(this).data('quan')
              let quan = $('#quanty-' + id).val();
              $('#quanty-' + id).prop("value", parseInt(quan) + 1);

            })
            $(document).on("click", ".minus-quan", function() {
              let id = $(this).data('id')
              let quan = $('#quanty-' + id).val();
              $('#quanty-' + id).prop("value", quan - 1);
              // let id = $(this).data('id')
              // let quan = $(this).data('quan')
            })
            $(document).on("click", ".delete", function() {
              let id = $(this).data('id')
              $('#del_id').prop("value", id);
            })
            $(document).on("click", "#confirm-delete", function() {
              let id = $('#del_id').val();
              data = {
                id: id
              }
              $.ajax({
                type: 'POST',
                url: 'cart/remove-to-cart',
                data: data,
                success: function(res) {
                  alert('Xoá thành công');
                  $('#smaill').click();
                  location.reload()
                },
                error: function(res) {
                  alert(JSON.parse(res.responseText).msg);
                }
              });
            })
          </script>