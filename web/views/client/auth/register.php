<?php extract($data ?? []); ?>

<div class="auth-container">

    <div class="auth-box large">

        <h2>Đăng ký tài khoản</h2>

        <?php if (!empty($error)) : ?>
            <div class="auth-error"><?= $error ?></div>
        <?php endif; ?>

        <form action="?mode=client&action=register-handle" method="POST">

            <div class="form-row">
                <input type="text" name="full_name" placeholder="Họ và tên" required>
                <input type="text" name="user_name" placeholder="Tên đăng nhập" required>
            </div>

            <div class="form-row">
                <input type="email" name="email" placeholder="Email (@gmail.com)" required>
                <input type="text" name="phone" placeholder="Số điện thoại" required>
            </div>

            <div class="form-group">
                <textarea name="address" placeholder="Địa chỉ" required></textarea>
            </div>

            <div class="form-group">
                <input type="password" name="pass_word" placeholder="Mật khẩu" required>
            </div>

            <button class="btn-primary">Đăng ký</button>

            <p class="auth-link">
                Đã có tài khoản?
                <a href="?mode=client&action=login">Đăng nhập</a>
            </p>

        </form>

    </div>

</div>
<style>
/* ===== AUTH WRAPPER ===== */
.auth-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* ===== BOX ===== */
.auth-box {
    width: 420px;
    background: #fff;
    padding: 30px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
}

/* ===== TITLE ===== */
.auth-box h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #111827;
}

/* ===== ERROR ===== */
.auth-error {
    background: #fee2e2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 13px;
}

/* ===== FORM ===== */
.auth-box form {
    display: block;
}

/* ===== ROW ===== */
.auth-box .form-row {
    display: flex;
    gap: 10px;
    margin-bottom: 12px;
}

.auth-box .form-row input {
    flex: 1;
}

/* ===== INPUT ===== */
.auth-box input,
.auth-box textarea {
    width: 100% !important;
    padding: 12px !important;
    border-radius: 10px !important;
    border: 1px solid #d1d5db !important;
    font-size: 14px;
    background: #fff;
}

/* FIX BOOTSTRAP */
.form-control {
    all: unset;
}

/* ===== FOCUS ===== */
.auth-box input:focus,
.auth-box textarea:focus {
    border-color: #111827 !important;
    outline: none;
}

/* ===== TEXTAREA ===== */
.auth-box textarea {
    resize: none;
    margin-bottom: 12px;
}

/* ===== BUTTON ===== */
.auth-box button {
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

.auth-box button:hover {
    background: #000;
}

/* ===== LINK ===== */
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