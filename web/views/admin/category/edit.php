<div class="form-container">

    <div class="form-header">
        <h2>Sửa danh mục</h2>
        <a href="?mode=admin&action=category-list" class="btn-back">Quay lại</a>
    </div>

    <?php if (!empty($error)) : ?>
        <div class="form-error"><?= $error ?></div>
    <?php endif; ?>

    <form action="?mode=admin&action=category-update" method="POST">

        <input type="hidden" name="id" value="<?= $category['id'] ?? '' ?>">

        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" value="<?= $category['name'] ?? '' ?>" required>
        </div>

        <button class="btn-submit update">Cập nhật</button>

    </form>

</div>
<style>
    /* HEADER TOP */
/* ===== FORM WRAPPER ===== */
.form-container {
    max-width: 480px;
    margin: 50px auto;
    background: #ffffff;
    padding: 32px;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
}

/* ===== HEADER ===== */
.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.form-header h2 {
    font-size: 20px;
    font-weight: 600;
    color: #111827;
}

/* ===== BACK BUTTON ===== */
.btn-back {
    font-size: 13px;
    color: #6b7280;
    text-decoration: none;
}

.btn-back:hover {
    color: #111827;
}

/* ===== ERROR ===== */
.form-error {
    background: #fef2f2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 16px;
    font-size: 13px;
}

/* ===== INPUT ===== */
.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    font-size: 13px;
    color: #374151;
    margin-bottom: 6px;
}

.form-group input {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 14px;
    background: #fff;
    transition: 0.2s;
}

.form-group input:focus {
    border-color: #6366f1;
    outline: none;
}

/* ===== BUTTON ===== */
.btn-submit {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    background: #111827;
    color: white;
    font-weight: 500;
    cursor: pointer;
    transition: 0.2s;
}

.btn-submit:hover {
    background: #000;
}

/* ===== UPDATE STYLE ===== */
.btn-submit.update {
    background: #2563eb;
}

.btn-submit.update:hover {
    background: #1d4ed8;
}
</style>