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
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Danh sách loại sản phẩm</h4>
          <!-- Modal -->
          <!-- Default Modal -->
          <div class="col-lg-4 col-md-6">
            <div class="mt-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">Thêm loại sản phẩm</button>
              <!--Add Modal -->
              <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Thêm loại sản phẩm</h5>
                      <button type="button" id="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAddCategory">
                      <input class="form-check-input" name="id" type="hidden" id="id" />

                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="category_name" class="form-label">Tên loại sản phẩm</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Nhập tên loại" />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <img src="" name="image" id="image" class="w-px-100 h-px-100" />
                          </div>
                          <div class="col mb-3">
                            <label for="file" class="form-label">Chọn ảnh mới</label>
                            <input class="form-control" type="file" name="file" id="file" />
                          </div>
                        </div>

                        <div class="row g-2">
                          <div class="col mb-0">
                            <label for="description" class="form-label">Mô tả</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Nhập mô tả" />
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
                  <h5 class="modal-title" id="exampleModalLabel2">Bạn chắc chắn muốn xoá loại sản phẩm này?</h5>
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
            <h5 class="card-header">Danh sách loại sản phẩm</br>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr class="text-nowrap">
                      <th>#</th>
                      <th>Ảnh</th>
                      <th>Tên loại</th>
                      <th>Mô tả</th>
                      <th>Trạng thái</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i = 0; $i < count($Categorys); $i++) { ?>
                      <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td>
                          <img src="<?= $Categorys[$i]['image'] ?>" onerror="this.src='../../public/assets/img/avatars/1.png'" class="w-px-40 h-px-40  rounded-circle" />
                        </td>
                        <!-- <td><?= $Categorys[$i]['id'] ?></td> -->
                        <td><?= $Categorys[$i]['category_name'] ?></td>
                        <td><?= $Categorys[$i]['description'] ?></td>
                        <td><?= ($Categorys[$i]['is_active'] == 1 ? 'Hoạt động' : 'Khoá') ?></td>
                        <td>
                          <button type="button" class=" edit btn btn-outline-primary
                          " data-id="<?php echo $Categorys[$i]['id']; ?>" data-category-name="<?php echo $Categorys[$i]['category_name']; ?>" data-description="<?php echo $Categorys[$i]['description']; ?>" data-image="<?php echo $Categorys[$i]['image']; ?>" data-is-active="<?php echo $Categorys[$i]['is_active']; ?>" data-bs-toggle="modal" data-bs-target="#basicModal">Sửa</button>
                          <button value="<?php echo $Categorys[$i]['id']; ?>" type="button" class=" delete btn btn-outline-danger" data-bs-toggle="modal" data-id="<?php echo $Categorys[$i]['id']; ?>" data-bs-target="#smallModal">Xoá</button>
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
              <h6>Tìm thấy <?= count($Categorys) ?> kết quả</h6>
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
                          <?php } else if (count($Categorys) > 0 || $i < $page) { ?>
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
          $('#basicModal').on('show.bs.modal', function(e) {
            let id = $('#id').val();
            if (id != undefined && id != '') {
              $('#password').prop("disabled", true);
            } else {
              $('#password').prop("disabled", false);
            }
          })
          $('#formAddCategory').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            let id = $('#id').val();
            let url = 'api/category/add'
            var img_url = $('#image').attr('src');

            if (id != undefined && id != '') {
              url = 'api/category/update'
            }

            if (img_url != '' && img_url != undefined && $('#file')[0].files[0] == undefined) {
              $.ajax({
                type: 'POST',
                url: url,
                data: form.serialize() + "&image=" + img_url,
                success: function(res) {
                  if (id != undefined && id != '') {
                    alert('Cập nhật loại sản phẩm thành công');
                  } else {
                    alert('Thêm loại sản phẩm thành công');
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
                  $('#image').prop("src", img_url);
                  $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize() + "&image=" + img_url,
                    success: function(res) {
                      if (id != undefined && id != '') {
                        alert('Cập nhật loại sản phẩm thành công');
                      } else {
                        alert('Thêm loại sản phẩm thành công');
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
          $(document).on("click", ".edit", function() {
            let id = $(this).data('id')
            let category_name = $(this).data('category-name')
            let is_active = $(this).data('is-active')
            let description = $(this).data('description')
            let image = $(this).data('image')

            $('#category_name').prop("value", category_name);
            $('#is_active').prop("checked", is_active == 1);
            $('#description').prop("value", description);
            $('#id').prop("value", id);
            $('#image').prop("src", image);
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
              url: 'api/category/delete',
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