<?php

$action = $_GET['action'] ?? '/';

match ($action) {

    '/' => (new AdminDashboardController)->index(),

    // auth admin
    'login'         => (new AdminAuthController)->showLogin(),
    'login-handle'  => (new AdminAuthController)->login(),
    'logout'        => (new AdminAuthController)->logout(),

    // category
    'category-list'     => (new AdminCategoryController)->index(),
    'category-create'   => (new AdminCategoryController)->create(),
    'category-store'    => (new AdminCategoryController)->store(),
    'category-edit'     => (new AdminCategoryController)->edit(),
    'category-update'   => (new AdminCategoryController)->update(),
    'category-delete'   => (new AdminCategoryController)->delete(),

    // product
    'product-list'      => (new AdminProductController)->index(),
    'product-create'    => (new AdminProductController)->create(),
    'product-store'     => (new AdminProductController)->store(),
    'product-edit'      => (new AdminProductController)->edit(),
    'product-update'    => (new AdminProductController)->update(),
    'product-delete'    => (new AdminProductController)->delete(),

    // user
    'user-list'         => (new AdminUserController)->index(),
    'user-delete'       => (new AdminUserController)->delete(),

    // order
    'order-list'        => (new AdminOrderController)->index(),
    'order-detail'      => (new AdminOrderController)->detail(),
    'order-update'      => (new AdminOrderController)->updateStatus(),
    'delete-image' => (new AdminProductController)->deleteImage(),

    
};