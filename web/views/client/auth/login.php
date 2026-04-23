<?php extract($data ?? []); ?>

<div class="auth-container">

    <div class="auth-box">

        <h2>Đăng nhập</h2>

        <?php if (!empty($error)) : ?>
            <div class="auth-error"><?= $error ?></div>
        <?php endif; ?>

        <form action="?mode=client&action=login-handle" method="POST">

            <div class="form-group">
                <label>Tên đăng nhập</label>
                <input type="text" name="user_name" required>
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="pass_word" required>
            </div>

            <button class="btn-primary">Đăng nhập</button>

            <p class="auth-link">
                Chưa có tài khoản?
                <a href="?mode=client&action=register">Đăng ký</a>
            </p>

        </form>

    </div>

</div>
<style>
    /* WRAPPER */
.auth-container {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* BOX */
.auth-box {
    width: 360px;
    background: white;
    padding: 30px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
}

/* TITLE */
.auth-box h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #111827;
}

/* GROUP */
.form-group {
    margin-bottom: 16px;
}

.form-group label {
    font-size: 13px;
    color: #374151;
    margin-bottom: 5px;
    display: block;
}

/* INPUT */
.auth-box input {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 14px;
}

.auth-box input:focus {
    border-color: #111827;
    outline: none;
}

/* BUTTON */
.btn-primary {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    background: #111827;
    color: white;
    font-weight: 500;
    cursor: pointer;
    margin-top: 10px;
}

.btn-primary:hover {
    background: #000;
}

/* ERROR */
.auth-error {
    background: #fef2f2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 13px;
}

/* LINK */
.auth-link {
    text-align: center;
    margin-top: 15px;
    font-size: 13px;
}

.auth-link a {
    color: #2563eb;
    text-decoration: none;
}

.auth-link a:hover {
    text-decoration: underline;
}
</style>