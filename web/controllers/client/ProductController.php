<?php

class ProductController
{
    public function index()
    {
        $title = "Danh sách sản phẩm";

        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();

        $categories = $categoryModel->getAll();

        $category_id = $_GET['category_id'] ?? null;

        if ($category_id) {
            $products = $productModel->getByCategory($category_id);
        } else {
            $products = $productModel->getAll();
        }

        $view = "product/list";
        $data = compact('products', 'categories');

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function detail()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?mode=client&action=product-list");
            exit;
        }

        $productModel = new ProductModel();
        $commentModel = new CommentModel();

        // lấy dư liệu sản phẩm, hình ảnh, đánh giá, bình luận
        $product = $productModel->getByID($id);
        $rating = $productModel->getRating($id);
        $images = $productModel->getImages($id);
        $comments = $commentModel->getByProduct($id);
        $related = $productModel->getRelated($product['category_id'], $id);

        $title = "Chi tiết sản phẩm";
        $view = "product/detail";

        // truyền dữ liệu ra view
        $data = compact('product', 'rating', 'images', 'comments', 'related');

        require_once PATH_VIEW_MAIN_CLIENT;
    }
    // tìm kiếm sản phẩm
        public function search()
        {
        $keyword = $_GET['keyword'] ?? '';

        $productModel = new ProductModel();
        $products = $productModel->search($keyword);

        $title = "Kết quả tìm kiếm: " . $keyword;
        $view = "product/search";
        $data = compact('products', 'keyword');

        require_once PATH_VIEW_MAIN_CLIENT;
        }
        public function searchAjax()
        {
        $keyword = $_GET['keyword'] ?? '';

        $productModel = new ProductModel();
        $products = $productModel->search($keyword);

        foreach ($products as $item) {
        echo "
        <a href='?mode=client&action=product-detail&id={$item['id']}'
           class='d-flex align-items-center p-2 text-decoration-none text-dark border-bottom'>
           
            <img src='" . BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') . "' width='50' height='50' style='object-fit:cover;margin-right:10px;'>

            <div>
                <div>{$item['name']}</div>
                <div style='color:red;font-size:13px;'>" . number_format($item['price']) . "đ</div>
            </div>
        </a>
        ";
        }
    }
        public function comment()
    {
        $commentModel = new CommentModel();

        $commentModel->insert([
            'product_id' => $_POST['product_id'],
            'user_name'  => $_POST['user_name'],
            'content'    => $_POST['content'],
            'rating'     => $_POST['rating']
        ]);

        header("Location: ?mode=client&action=product-detail&id=" . $_POST['product_id']);
        exit;
    }
        public function favorite()
    {
        $id = $_GET['id'];

        if (!isset($_SESSION['favorite'])) {
            $_SESSION['favorite'] = [];
        }

        if (in_array($id, $_SESSION['favorite'])) {
            $_SESSION['favorite'] = array_diff($_SESSION['favorite'], [$id]);
        } else {
            $_SESSION['favorite'][] = $id;
        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
        
}