<?php

$cookie_name = 'isLogin';
if (!isset($_COOKIE['isLogin'])) {
    header("Location: http://localhost:8080/login");
    exit;
} else {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    // echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="../../public/assets/img/favicon/logo.png" style="width: 40px;height:40px" />
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Autumn Admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Trang chủ</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Quản lý cửa hàng</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">Tài khoản</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/list-account" class="menu-link">
                        <div data-i18n="Account">Danh sách tài khoản</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/list-account-locked" class="menu-link">
                        <div data-i18n="Account">Danh sách tài khoản bị khoá</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store-alt"></i>
                <div data-i18n="Authentications">Sản phẩm</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/category" class="menu-link">
                        <div data-i18n="Basic">Danh sách loại sản phẩm</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/product" class="menu-link">
                        <div data-i18n="Basic">Danh sách sản phẩm</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/promotion" class="menu-link">
                        <div data-i18n="Basic">Chương trình giảm giá</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Authentications">Đơn hàng</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/order" class="menu-link">
                        <div data-i18n="Basic">Đơn hàng mới</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/order-finished" class="menu-link">
                        <div data-i18n="Basic">Đơn hàng đã hoàn thành</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/order-canceled" class="menu-link">
                        <div data-i18n="Basic">Đơn hàng đã huỷ</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>