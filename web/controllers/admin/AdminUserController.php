<?php

class AdminUserController
{
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

        $title = "Quản lý tài khoản";
        $users = (new UserModel())->getAll();

        $view = "user/index";
        $data = compact('users');

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function delete()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        if ($id) {
            if ($_SESSION['admin']['id'] != $id) {
                (new UserModel())->delete($id);
            }
        }

        header("Location: ?mode=admin&action=user-list");
        exit;
    }
}