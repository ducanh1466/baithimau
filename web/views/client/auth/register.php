<?php
extract($data ?? []);
?>

<div class="col-md-6 offset-md-3">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Đăng ký tài khoản</h5>
        </div>

        <div class="card-body">

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="?mode=client&action=register-handle" method="POST">

                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" name="user_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control" rows="2" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="pass_word" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Đăng ký
                </button>

                <p class="mt-3 text-center">
                    Đã có tài khoản?
                    <a href="?mode=client&action=login">Đăng nhập</a>
                </p>

            </form>

        </div>
    </div>
</div>