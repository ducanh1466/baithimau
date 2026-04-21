<?php

class AdminAuthController
{
    public function showLogin()
    {
        $title = "Đăng nhập Admin";
        $view = "auth/login";

        require_once PATH_VIEW_MAIN_ADMIN;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = trim($_POST['user_name'] ?? '');
            $password = trim($_POST['pass_word'] ?? '');

            $userModel = new UserModel();
            $user = $userModel->findByUsername($username);

            if ($user && $user['pass_word'] == md5($password) && $user['id_role'] == 2) {
                $_SESSION['admin'] = $user;

                header("Location: ?mode=admin&action=/");
                exit;
            }

            $error = "Sai tài khoản hoặc mật khẩu!";
            $title = "Đăng nhập Admin";
            $view = "auth/login";
            $data = compact('error');

            require_once PATH_VIEW_MAIN_ADMIN;
        }
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        header("Location: ?mode=admin&action=login");
        exit;
    }
}