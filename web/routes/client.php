<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'                 => (new HomeController)->index(),

    // sản phẩm
    'product-list'      => (new ProductController)->index(),
    'product-detail'    => (new ProductController)->detail(),

    // auth
    'login'             => (new AuthController)->showLogin(),
    'login-handle'      => (new AuthController)->login(),
    'register'          => (new AuthController)->showRegister(),
    'register-handle'   => (new AuthController)->register(),
    'logout'            => (new AuthController)->logout(),

    // cart
    'cart'              => (new CartController)->index(),
    'cart-add'          => (new CartController)->add(),
    'cart-update'       => (new CartController)->update(),
    'cart-delete'       => (new CartController)->delete(),

    // checkout
    'checkout'          => (new OrderController)->checkout(),
    'checkout-handle'   => (new OrderController)->store(),
    // search
    'search' => (new ProductController)->search(),
    'search-ajax' => (new ProductController)->searchAjax(),
    'comment' => (new ProductController)->comment(),
    'home-page' => (new HomeController)->homePage(),
    'favorite' => (new ProductController)->favorite(),
    'about' => (new HomeController)->about(),

};