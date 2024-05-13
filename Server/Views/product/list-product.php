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
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Danh sách Sản phẩm</h4>
          <!-- Modal -->
          <!-- Default Modal -->
          <div class="col-lg-4 col-md-6">
            <div class="mt-3">
              <!-- Button trigger modal -->
              <button type="button" id="add_btn" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm Sản phẩm</button>
              <!--Add Modal -->
              <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Thêm Sản phẩm</h5>
                      <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAddProduct">
                      <input class="form-check-input" name="id" type="hidden" id="id" />
                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="product_name" class="form-label">Tên Sản phẩm</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Nhập tên loại" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <img src="" name="product_image" id="product_image" class="w-px-100 h-px-100" />
                          </div>
                          <div class="col mb-3">
                            <label for="file" class="form-label">Chọn ảnh mới</label>
                            <input class="form-control" type="file" name="file" id="file" />
                          </div>
                        </div>

                        <div class="row g-2">
                          <div class="col mb-0">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Nhập mô tả" type="text" name="price" id="price" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleDataList" class="form-label">Loại sản phẩm</label>
                          <select class="form-select" name="category_id" id="category_id" aria-label="Chọn loại sản phẩm">
                            <?php foreach ($Categorys as $cate) { ?>
                              <option value="<?= $cate['id'] ?>"><?= $cate['category_name'] ?></option>
                            <?php } ?>
                          </select>

                        </div>
                        <div class="row g-2">
                          <div class="col mb-0">
                            <label for="quan" class="form-label">Số lượng</label>
                            <input type="number" name="quan" id="quan" class="form-control" placeholder="Nhập mô tả" />
                          </div>
                        </div>
                        <div class="row g-2">
                          <div class="col mb-0">
                            <label for="price" class="form-label">Đơn giá</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Nhập mô tả" />
                          </div>
                        </div>
                        <div>
                          <div class="col mb-0">
                            <label for="is_active" class="form-label">Hoạt động</label>
                            <input class="form-check-input" name="is_active" class="checkbox" type="checkbox" id="is_active" />
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="reset" id="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Huỷ
                        </button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                      </div>
                    </form>
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
                  <h5 class="modal-title" id="exampleModalLabel2">Bạn chắc chắn muốn xoá Sản phẩm này?</h5>
                </div>
                <div class="modal-footer">
                  <input class="form-check-input" name="del_id" type="hidden" id="del_id" />
                  <button type="button" id="confirm-delete" name="confirm-delete" class="btn btn-primary">Xoá</button>
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Huỷ
                  </button>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-3" />
          <!-- Responsive Table -->
          <div class="card">
            <h5 class="card-header">Danh sách Sản phẩm</br>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr class="text-nowrap">
                      <th>#</th>
                      <th>Ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Mô tả</th>
                      <th>Loại sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Trạng thái</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i = 0; $i < count($Products); $i++) { ?>
                      <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td>
                          <img src="<?= $Products[$i]['product_image'] ?>" onerror="this.src='../../public/assets/img/avatars/1.png'" class="w-px-40 h-px-40  rounded-circle" />
                        </td>
                        <!-- <td><?= $Products[$i]['id'] ?></td> -->
                        <td><?= $Products[$i]['name'] ?></td>
                        <td><?= $Products[$i]['description'] ?></td>
                        <?php
                        $is_found = 0;
                        foreach ($Categorys as $element) {
                          if ($Products[$i]['category_id'] == $element['id']) {
                            $is_found = 1;
                        ?>
                            <td><?= $element['category_name'] ?></td>
                          <?php }
                        }
                        if ($is_found == 0) { ?>
                          <td></td>
                        <?php } ?>
                        <td><?= $Products[$i]['quan'] ?></td>
                        <td><?= $Products[$i]['price'] ?></td>
                        <td><?= ($Products[$i]['is_active'] == 1 ? 'Hoạt động' : 'Khoá') ?></td>
                        <td>
                          <button type="button" class=" edit btn btn-outline-primary
                          " data-id="<?php echo $Products[$i]['id']; ?>" data-product-name="<?php echo $Products[$i]['name']; ?>" data-category-id="<?php echo $Products[$i]['category_id']; ?>" data-description="<?php echo $Products[$i]['description']; ?>" data-image="<?php echo $Products[$i]['product_image']; ?>" data-is-active="<?php echo $Products[$i]['is_active']; ?>" data-quan="<?php echo $Products[$i]['quan']; ?>" data-price="<?php echo $Products[$i]['price']; ?>" data-bs-toggle="modal" data-bs-target="#basicModal">Sửa</button>
                          <button value="<?php echo $Products[$i]['id']; ?>" type="button" class=" delete btn btn-outline-danger" data-bs-toggle="modal" data-id="<?php echo $Products[$i]['id']; ?>" data-bs-target="#smallModal">Xoá</button>
                        </td>
                      </tr>
                    <?php }; ?>
                  </tbody>
                </table>
              </div>
          </div>
          <!--/ Responsive Table -->
          <div class="card mb-4">
            <!-- Basic Pagination -->
            <div class="card-body">
              <h6>Tìm thấy <?= count($Products) ?> kết quả</h6>
              </h5>

              <div class="row">
                <div class="col">
                  <div class="demo-inline-spacing">
                    <!-- Basic Pagination -->
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <li class="page-item first">
                          <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                        </li>
                        <li class="page-item prev">
                          <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                        </li>
                        <?php
                        $page = isset($_GET['page']) && $_GET['page'] > 0 ?  $_GET['page'] : 1;
                        $i = $page > 2 ?  $page - 2 : 1;
                        for ($i; $i <=  $page + 2; $i++) {
                          $query = $_GET;
                          $query['page'] = $i;
                          $query_result = http_build_query($query);
                          $href = 'http://' . $_SERVER['HTTP_HOST'] . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?' . $query_result;
                          if ($page == $i) { ?>
                            <li class="page-item active">
                              <a class="page-link" href="<?php echo $href ?>"><?= $i ?></a>
                            </li>
                          <?php } else if (count($Products) > 0 || $i < $page) { ?>
                            <li class="page-item">
                              <a class="page-link" href="<?php echo $href ?>"><?= $i ?></a>
                            </li>
                          <?php }; ?>
                        <?php }; ?>
                        <li class="page-item next">
                          <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                        </li>
                        <li class="page-item last">
                          <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                    <!--/ Basic Pagination -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->
        <?php require_once __DIR__ . "/../layouts/footer.php"; ?>
        <script>
          $('#formAddProduct').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            let id = $('#id').val();
            let url = 'api/product/add'
            var img_url = $('#product_image').attr('src');

            if (id != undefined && id != '') {
              url = 'api/product/update'
            }

            if (img_url != '' && img_url != undefined && $('#file')[0].files[0] == undefined) {
              $.ajax({
                type: 'POST',
                url: url,
                data: form.serialize() + "&product_image=" + img_url,
                success: function(res) {
                  if (id != undefined && id != '') {
                    alert('Cập nhật Sản phẩm thành công');
                  } else {
                    alert('Thêm Sản phẩm thành công');
                  }
                  $('#closeModal').click();
                  $('#reset').click();
                  location.reload()
                },
                error: function(res) {
                  alert(JSON.parse(res.responseText).msg);
                }
              });
            } else {
              var formData = new FormData();

              formData.append('file', $('#file')[0].files[0]);
              $.ajax({
                url: 'api/upload',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                  let img_url = JSON.parse(res).data
                  $('#product_image').prop("src", img_url);
                  $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize() + "&product_image=" + img_url,
                    success: function(res) {
                      if (id != undefined && id != '') {
                        alert('Cập nhật Sản phẩm thành công');
                      } else {
                        alert('Thêm Sản phẩm thành công');
                      }
                      $('#closeModal').click();
                      $('#reset').click();
                      location.reload()
                    },
                    error: function(res) {
                      alert(JSON.parse(res.responseText).msg);
                    }
                  });
                },
                error: function(res) {
                  alert(JSON.parse(res.responseText).msg);
                }
              });
            }

          });
          $(document).on("click", "#add_btn", function() {
            $('#reset').click();
            $('#product_image').prop("src", '');
          });
          $(document).on("click", ".edit", function() {
            $('#reset').click();
            $('#product_image').prop("src", '');

            let id = $(this).data('id')
            let product_name = $(this).data('product-name')
            let category_id = $(this).data('category-id')
            let is_active = $(this).data('is-active')
            let description = $(this).data('description')
            let image = $(this).data('image')
            let quan = $(this).data('quan')
            let price = $(this).data('price')

            $('#product_name').prop("value", product_name);
            $('#category_id').prop("value", category_id);
            $('#is_active').prop("checked", is_active == 1);
            $('#description').prop("value", description);
            $('#id').prop("value", id);
            $('#price').prop("value", price);
            $('#quan').prop("value", quan);
            $('#product_image').prop("src", image);
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
              url: 'api/product/delete',
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