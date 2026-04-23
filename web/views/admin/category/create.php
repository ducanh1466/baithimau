<?php extract($data ?? []); ?>

<div class="form-container">

    <h2>Thêm danh mục</h2>

    <?php if (!empty($error)) : ?>
        <div class="form-error"><?= $error ?></div>
    <?php endif; ?>

    <form action="?mode=admin&action=category-store" method="POST">

        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" required>
        </div>

        <button type="submit" class="btn-submit">
            Thêm mới
        </button>

    </form>

</div>
<style>
    /* FORM BOX */
.form-container {
    max-width: 500px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.05);
}

/* TITLE */
.form-container h2 {
    margin-bottom: 20px;
    font-size: 20px;
    color: #1e293b;
}

/* GROUP */
.form-group {
    margin-bottom: 20px;
}

/* LABEL */
.form-group label {
    display: block;
    margin-bottom: 6px;
    font-size: 14px;
    color: #64748b;
}

/* INPUT */
.form-group input {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
    font-size: 14px;
    transition: 0.3s;
}

.form-group input:focus {
    border-color: #6366f1;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    outline: none;
}

/* BUTTON */
.btn-submit {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg,#6366f1,#4f46e5);
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn-submit:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 20px rgba(99,102,241,0.3);
}

/* ERROR */
.form-error {
    background: #fee2e2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}
</style>