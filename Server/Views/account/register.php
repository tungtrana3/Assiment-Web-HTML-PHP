<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<!-- Content -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="/" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">Autumn Admin</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <form id="formAuthentication" class="mb-3" action="/" method="POST">
                        <div class="mb-3">
                            <label for="Số điện thoại" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="Số điện thoại" name="Số điện thoại" placeholder="Số điện thoại" autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Mật khẩu</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    Tôi đã đọc và đồng ý với
                                    <a href="javascript:void(0);">chính sách bảo mật</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">Đăng ký</button>
                    </form>
                    <p class="text-center">
                        <span>Đã có tài khoản?</span>
                        <a href="/login">
                            <span>Đăng nhập</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>
<!-- / Content -->
<?php require_once __DIR__ . "/../layouts/footer.php"; ?>