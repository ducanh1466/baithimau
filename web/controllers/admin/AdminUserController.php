<?php

class AdminUserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    // 🔥 kiểm tra đăng nhập admin
    private function checkLogin()
    {
        if (!isset($_SESSION['admin'])) {
            header("Location: ?mode=admin&action=login");
            exit;
        }
    }
// 🔥 danh sách tài khoản
    public function index()
    {
        $this->checkLogin();

        $title = "Quản lý tài khoản";
        $users = $this->userModel->getAll();

        $view = "user/index";
        $data = compact('users');

        require_once PATH_VIEW_MAIN_ADMIN;
    }
// 🔥 delete tài khoản (không cho phép xóa chính mình)
    public function delete()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        if ($id) {
            if ($_SESSION['admin']['id'] != $id) {
                $this->userModel->delete($id);
            }
        }

        header("Location: ?mode=admin&action=user-list");
        exit;
    }
    // 🔥 edit form

    public function edit()
    {
        $this->checkLogin();

        $id = $_GET['id'] ?? null;

        $user = $this->userModel->getByID($id);

        $view = "user/edit";
        $data = compact('user');

        require_once PATH_VIEW_MAIN_ADMIN;
    }
    // 🔥 update có thể thay đổi tất cả thông tin, kể cả mật khẩu (nếu nhập)
        public function update()
    {
        $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'] ?? null;

            $data = [
                'user_name' => $_POST['user_name'],
                'full_name' => $_POST['full_name'],
                'email'     => $_POST['email'],
                'phone'     => $_POST['phone'],
                'address'   => $_POST['address'],
                'id_role'   => $_POST['id_role']
            ];

            // 🔥 nếu có nhập mật khẩu mới
            if (!empty($_POST['pass_word'])) {
                $data['pass_word'] = $_POST['pass_word'];
            }

            $this->userModel->update($data, $id);

            header("Location: ?mode=admin&action=user-list");
            exit;
        }
    }
    public function store()
{
    $this->checkLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // 🔥 validate cơ bản
        if ($this->userModel->existsUsername($_POST['user_name'])) {
            $error = "Username đã tồn tại!";

            $view = "user/create";
            $data = compact('error');

            require_once PATH_VIEW_MAIN_ADMIN;
            return;
        }

        // 🔥 chuẩn bị data
        $data = [
            'user_name' => $_POST['user_name'],
            'pass_word' => $_POST['pass_word'], // model sẽ hash
            'full_name' => $_POST['full_name'] ?? '',
            'email'     => $_POST['email'] ?? '',
            'phone'     => $_POST['phone'] ?? '',
            'address'   => $_POST['address'] ?? '',
            'id_role'   => $_POST['id_role'] ?? 1
        ];

        // 🔥 lưu DB
        $this->userModel->insert($data);

        header("Location: ?mode=admin&action=user-list");
        exit;
    }

}
        public function create()
        {
            $this->checkLogin();

            $title = "Thêm tài khoản";

            $view = "user/create";

            require_once PATH_VIEW_MAIN_ADMIN;
        }
                public function lock()
        {
            $this->checkLogin();

            $id = $_GET['id'];

            $this->userModel->updateStatus($id, 0); // khóa

            header("Location: ?mode=admin&action=user-list");
        }
                public function unlock()
        {
            $this->checkLogin();

            $id = $_GET['id'];

            $this->userModel->updateStatus($id, 1); // mở khóa

            header("Location: ?mode=admin&action=user-list");
        }
}