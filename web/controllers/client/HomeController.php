<?php

class HomeController
{
    public function index()
    {
        $title = "Trang chủ";

        $productModel = new ProductModel();

        // lấy dữ liệu
        $products = $productModel->getAll();
        $favoriteProducts = $productModel->getTopFavorite();
        $latestProducts   = $productModel->getLatest();

        $view = "home/index";

        $data = compact('products', 'favoriteProducts', 'latestProducts');

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function notFound()
    {
        echo "404 Not Found";
    }
       public function homePage()
{
    $title = "Trang chủ";

    $productModel = new ProductModel();
    $commentModel = new CommentModel();

    $favoriteProducts = $productModel->getTopFavorite();
    $latestProducts   = $productModel->getLatest();
    $comments         = $commentModel->getLatest();

    $view = "home/homepage";

    $data = [
        'favoriteProducts' => $favoriteProducts,
        'latestProducts'   => $latestProducts,
        'comments'         => $comments
    ];

    require_once PATH_VIEW_MAIN_CLIENT;
}
public function about()
{
    $title = "Giới thiệu";
    $view = "home/about";

    require_once PATH_VIEW_MAIN_CLIENT;
}
    
}
