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
        

        if ($user) {

    // ❌ bị khóa
    if (isset($user['status']) && $user['status'] == 0) {
        $error = "Tài khoản đã bị khóa!";
    }

    // ✅ password_hash (user mới)
    else if (password_verify($password, $user['pass_word'])) {
        $_SESSION['user'] = $user;

        header("Location: ?mode=client&action=/");
        exit;
    }

    // 🔥 fallback cho user cũ (md5)
    else if ($user['pass_word'] == md5($password)) {
        $_SESSION['user'] = $user;

        header("Location: ?mode=client&action=/");
        exit;
    }

    else {
        $error = "Sai mật khẩu!";
    }

} else {
    $error = "Tài khoản không tồn tại!";
}
        //  LOAD LẠI VIEW
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
            $email = trim($_POST['email'] ?? '');

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
            // 🔥 CHECK EMAIL
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '@gmail.com')) {
                $error = "Email phải đúng định dạng và kết thúc bằng @gmail.com";

                $title = "Đăng ký";
                $view = "auth/register";
                $data = compact('error');

                require_once PATH_VIEW_MAIN_CLIENT;
                return;
            }


            $userModel->insert([
                'user_name' => $_POST['user_name'],
                'pass_word' => $_POST['pass_word'], // 🔥 KHÔNG hash ở đây
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