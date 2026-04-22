<?php

class AdminProductController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    private function checkLogin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: ?mode=admin&action=login");
            exit;
        }
    }

    public function index()
    {
        $this->checkLogin();

        $title = "Quản lý sản phẩm";
        $products = $this->productModel->getAll();

        $view = "product/index";
        $data = compact('products');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function create()
    {
        $this->checkLogin();

        $categories = $this->categoryModel->getAll();

        $title = "Thêm sản phẩm";
        $view = "product/create";
        $data = compact('categories');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function store()
    {
        $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = trim($_POST['name'] ?? '');
            $price = $_POST['price'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;
            $description = trim($_POST['description'] ?? '');
            $category_id = $_POST['category_id'] ?? '';

            if ($name == '' || $price <= 0 || $quantity < 0 || $category_id == '') {
                $error = "Vui lòng nhập đầy đủ thông tin hợp lệ!";
                $categories = $this->categoryModel->getAll();

                $title = "Thêm sản phẩm";
                $view = "product/create";
                $data = compact('error', 'categories');

                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }

            // upload ảnh
            $imageName = null;
            if (!empty($_FILES['image']['name'])) {
                $imageName = time() . "_" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PATH_ASSETS_UPLOADS . "products/" . $imageName);
            }

            $this->productModel->insert([
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $imageName,
                'description' => $description,
                'category_id' => $category_id
            ]);

            header("Location: ?mode=admin&action=product-list");
            exit;
        }
        
    }

    public function edit()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?mode=admin&action=product-list");
            exit;
        }

        $product = $this->productModel->getByID($id);
        $categories = $this->categoryModel->getAll();
        $images = $this->productModel->getImages($id);

        $title = "Sửa sản phẩm";
        $view = "product/edit";
        $data = compact('product', 'categories', 'images');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function update(){

    $this->checkLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $price = $_POST['price'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        $description = trim($_POST['description'] ?? '');
        $category_id = $_POST['category_id'] ?? '';
        $old_image = $_POST['old_image'] ?? null;
        $color = trim($_POST['color'] ?? '');
        $material = trim($_POST['material'] ?? ''); 
        $brand = trim($_POST['brand'] ?? '');
        $sku = trim($_POST['sku'] ?? '');
        $fit = trim($_POST['fit'] ?? '');
        $technology = trim($_POST['technology'] ?? '');


        if ($name == '' || $price <= 0 || $quantity < 0 || $category_id == '') {
            $error = "Vui lòng nhập đầy đủ thông tin hợp lệ!";
            $product = $this->productModel->getByID($id);
            $categories = $this->categoryModel->getAll();

            $title = "Sửa sản phẩm";
            $view = "product/edit";
            $data = compact('error', 'product', 'categories', 'color', 'material', 'brand', 'sku', 'fit', 'technology');

            require_once PATH_VIEW_MAIN_ADMIN;
            return;
        }

        $imageName = $old_image;

        // ✅ ẢNH CHÍNH (giữ nguyên code bạn)
        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . "_" . $_FILES['image']['name'];
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                PATH_ASSETS_UPLOADS . "products/" . $imageName
            );

            if ($old_image && file_exists(PATH_ASSETS_UPLOADS . "products/" . $old_image)) {
                unlink(PATH_ASSETS_UPLOADS . "products/" . $old_image);
            }
        }

        //  UPDATE PRODUCT
                $this->productModel->update([
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $imageName,
            'description' => $description,
            'category_id' => $category_id,
            'color' => $color,
            'material' => $material,
            'brand' => $brand,
            'sku' => $sku,
            'fit' => $fit,
            'technology' => $technology

        ], $id);

        //  THÊM ĐOẠN UPLOAD NHIỀU ẢNH Ở ĐÂY
        if (!empty($_FILES['images']['name'][0])) {

            foreach ($_FILES['images']['name'] as $key => $nameImg) {

                $tmpName = $_FILES['images']['tmp_name'][$key];

                $fileName = time() . "_" . $nameImg;

                move_uploaded_file(
                    $tmpName,
                    PATH_ASSETS_UPLOADS . "products/" . $fileName
                );

                // gọi model để insert
                $this->productModel->insertImage($id, $fileName);
            }
        }

        header("Location: ?mode=admin&action=product-edit&id=" . $id);
        exit;
    }
}
    public function delete()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        if ($id) {
            $product = $this->productModel->getByID($id);

            if ($product && $product['image'] && file_exists(PATH_ASSETS_UPLOADS . "products/" . $product['image'])) {
                unlink(PATH_ASSETS_UPLOADS . "products/" . $product['image']);
            }

            $this->productModel->delete($id);
        }

        header("Location: ?mode=admin&action=product-list");
        exit;
    }
            public function deleteImage()
        {
            $id = $_GET['id'];
            $product_id = $_GET['product_id'];

            $model = new ProductModel();

            $model->deleteImage($id);

            header("Location: ?mode=admin&action=product-edit&id=" . $product_id);
            exit;
        }
}