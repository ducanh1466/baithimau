<?php extract($data ?? []); ?>

<div class="form-container">

    <div class="form-header">
        <h2>Thêm tài khoản</h2>
        <a href="?mode=admin&action=user-list" class="btn-back">← Quay lại</a>
    </div>

    <?php if (!empty($error)) : ?>
        <div class="form-error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="?mode=admin&action=user-store">

        <!-- USERNAME -->
        <div class="form-group">
            <label>User Name</label>
            <input name="user_name" required>
        </div>

        <!-- PASSWORD -->
        <div class="form-group">
            <label>Mật khẩu</label>
            <input name="pass_word" type="password" required>
        </div>

        <!-- INFO -->
        <div class="form-row">
            <input name="full_name" placeholder="Họ tên">
            <input name="email" placeholder="Email">
        </div>

        <div class="form-row">
            <input name="phone" placeholder="Số điện thoại">
            <input name="address" placeholder="Địa chỉ">
        </div>

        <!-- ROLE -->
        <div class="form-group">
            <label>Quyền</label>
            <select name="id_role">
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
        </div>

        <button class="btn-submit">Thêm tài khoản</button>

    </form>

</div>
<style>
    /* FORM */
.form-container {
    max-width: 600px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
}

/* HEADER */
.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.form-header h2 {
    font-size: 20px;
    color: #111827;
}

/* GROUP */
.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    font-size: 13px;
    margin-bottom: 5px;
    color: #374151;
}

/* INPUT */
.form-container input,
.form-container select {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 14px;
}

/* FOCUS */
.form-container input:focus,
.form-container select:focus {
    border-color: #6366f1;
    outline: none;
}

/* ROW */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
}

/* BUTTON */
.btn-submit {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    background: #111827;
    color: white;
    font-weight: 500;
    cursor: pointer;
}

.btn-submit:hover {
    background: #000;
}

/* ERROR */
.form-error {
    background: #fef2f2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}
</style>