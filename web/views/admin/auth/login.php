<?php
extract($data ?? []);
?>

<div class="col-md-6 offset-md-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Đăng nhập Admin</h5>
        </div>

        <div class="card-body">

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="?mode=admin&action=login-handle" method="POST">
                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" name="user_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="pass_word" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Đăng nhập
                </button>
            </form>

        </div>
    </div>
</div>