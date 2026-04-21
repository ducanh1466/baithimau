<?php

class AdminCategoryController
{
    private $categoryModel;

    public function __construct()
    {
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

        $title = "Quản lý danh mục";
        $categories = $this->categoryModel->getAll();

        $view = "category/index";
        $data = compact('categories');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function create()
    {
        $this->checkLogin();

        $title = "Thêm danh mục";
        $view = "category/create";

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function store()
    {
        $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = trim($_POST['name'] ?? '');

            if ($name == '') {
                $error = "Tên danh mục không được để trống!";
                $title = "Thêm danh mục";
                $view = "category/create";
                $data = compact('error');

                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }

            $this->categoryModel->insert(['name' => $name]);

            header("Location: ?mode=admin&action=category-list");
            exit;
        }
    }

    public function edit()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: ?mode=admin&action=category-list");
            exit;
        }

        $category = $this->categoryModel->getByID($id);

        $title = "Sửa danh mục";
        $view = "category/edit";
        $data = compact('category');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function update()
    {
        $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'] ?? null;
            $name = trim($_POST['name'] ?? '');

            if ($name == '') {
                $error = "Tên danh mục không được để trống!";
                $category = $this->categoryModel->getByID($id);

                $title = "Sửa danh mục";
                $view = "category/edit";
                $data = compact('error', 'category');

                require_once PATH_VIEW_MAIN_ADMIN;
                return;
            }

            $this->categoryModel->update(['name' => $name], $id);

            header("Location: ?mode=admin&action=category-list");
            exit;
        }
    }

    public function delete()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->categoryModel->delete($id);
        }

        header("Location: ?mode=admin&action=category-list");
        exit;
    }
}