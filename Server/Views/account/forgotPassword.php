<?php $Title = "Autumn Admin" ?>
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Chào mừng đến với</h4>
                    <form id="formAuthentication" class="mb-3" action="/" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email hoặc Số điện thoại</label>
                            <input type="text" class="form-control" id="email" name="email-username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <a href="forgot-password">
                                    <small>Quên mật khẩu?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Ghi nhớ đăng nhập </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Đăng nhập</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <a href="/register">
                            <span>Đăng ký</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->
<?php require_once __DIR__ . "/../layouts/footer.php"; ?>