<?php extract($data ?? []); ?>

<div class="form-container">

    <div class="form-header">
        <h2>Sửa tài khoản</h2>
        <a href="?mode=admin&action=user-list" class="btn-back">← Quay lại</a>
    </div>

    <form method="POST" action="?mode=admin&action=user-update">

        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <!-- USERNAME -->
        <div class="form-group">
            <label>User Name</label>
            <input name="user_name" value="<?= $user['user_name'] ?>" required>
        </div>

        <!-- PASSWORD -->
        <div class="form-group">
            <label>Mật khẩu mới</label>
            <input name="pass_word" type="password">
            <small>Để trống nếu không đổi</small>
        </div>

        <!-- INFO -->
        <div class="form-row">
            <input name="full_name" value="<?= $user['full_name'] ?>" placeholder="Họ tên">
            <input name="email" value="<?= $user['email'] ?>" placeholder="Email">
        </div>

        <div class="form-row">
            <input name="phone" value="<?= $user['phone'] ?>" placeholder="Số điện thoại">
            <input name="address" value="<?= $user['address'] ?>" placeholder="Địa chỉ">
        </div>

        <!-- ROLE -->
        <div class="form-group">
            <label>Quyền</label>
            <select name="id_role">
                <option value="1" <?= $user['id_role']==1?'selected':'' ?>>User</option>
                <option value="2" <?= $user['id_role']==2?'selected':'' ?>>Admin</option>
            </select>
        </div>

        <button class="btn-submit update">Cập nhật</button>

    </form>

</div>
<style>
    /* FORM CONTAINER */
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

/* INPUT + SELECT */
.form-container input,
.form-container select {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 14px;
    background: #fff;
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

/* NOTE TEXT */
small {
    font-size: 12px;
    color: #6b7280;
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

.btn-submit.update {
    background: #2563eb;
}

.btn-submit:hover {
    opacity: 0.9;
}
</style>