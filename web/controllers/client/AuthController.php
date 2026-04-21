<?php

class AuthController
{
    public function showLogin()
    {
        $title = "Đăng nhập";
        $view = "auth/login";

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = trim($_POST['user_name'] ?? '');
            $password = trim($_POST['pass_word'] ?? '');

            $userModel = new UserModel();
            $user = $userModel->findByUsername($username);

            if ($user && $user['pass_word'] == md5($password)) {
                $_SESSION['user'] = $user;

                header("Location: ?mode=client&action=/");
                exit;
            }

            $error = "Sai tài khoản hoặc mật khẩu!";
            $title = "Đăng nhập";
            $view = "auth/login";
            $data = compact('error');

            require_once PATH_VIEW_MAIN_CLIENT;
        }
    }

    public function showRegister()
    {
        $title = "Đăng ký";
        $view = "auth/register";

        require_once PATH_VIEW_MAIN_CLIENT;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = trim($_POST['user_name'] ?? '');
            $password = trim($_POST['pass_word'] ?? '');

            $userModel = new UserModel();

            if ($username == '' || $password == '') {
                $error = "Vui lòng nhập đầy đủ thông tin!";
                $title = "Đăng ký";
                $view = "auth/register";
                $data = compact('error');

                require_once PATH_VIEW_MAIN_CLIENT;
                return;
            }

            $check = $userModel->findByUsername($username);
            if ($check) {
                $error = "Tài khoản đã tồn tại!";
                $title = "Đăng ký";
                $view = "auth/register";
                $data = compact('error');

                require_once PATH_VIEW_MAIN_CLIENT;
                return;
            }

            $userModel->insert([
                'user_name' => $_POST['user_name'],
                'pass_word' => md5($_POST['pass_word']),
                'full_name' => $_POST['full_name'],
                'email'     => $_POST['email'],
                'phone'     => $_POST['phone'],
                'address'   => $_POST['address'],
                'id_role'   => 1
            ]);
            header("Location: ?mode=client&action=login");
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location: ?mode=client&action=/");
        exit;
    }
}