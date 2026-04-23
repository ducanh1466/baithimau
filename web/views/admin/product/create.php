<?php extract($data ?? []); ?>

<div class="form-container large">

    <div class="form-header">
        <h2>Thêm sản phẩm</h2>
        <a href="?mode=admin&action=product-list" class="btn-back">
    ← Quay lại
</a>
    </div>

    <?php if (!empty($error)) : ?>
        <div class="form-error"><?= $error ?></div>
    <?php endif; ?>

    <form action="?mode=admin&action=product-store" method="POST" enctype="multipart/form-data">

        <!-- BASIC -->
        <div class="form-section">
            <h3>Thông tin cơ bản</h3>

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category_id" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Giá</label>
                    <input type="number" name="price" required>
                </div>

                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" name="quantity" required>
                </div>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="form-section">
            <h3>Hình ảnh</h3>

            <div class="form-group">
                <label>Ảnh chính</label>
                <input type="file" name="image">
            </div>

            <div class="form-group">
                <label>Ảnh phụ</label>
                <input type="file" name="images[]" multiple>
            </div>
        </div>

        <!-- DESCRIPTION -->
        <div class="form-section">
            <h3>Mô tả</h3>

            <div class="form-group">
                <textarea name="description" rows="4"></textarea>
            </div>
        </div>

        <!-- EXTRA INFO -->
        <div class="form-section">
            <h3>Thông tin sản phẩm</h3>

            <div class="form-row">
                <input type="text" name="color" placeholder="Màu">
                <input type="text" name="material" placeholder="Chất liệu">
                <input type="text" name="brand" placeholder="Thương hiệu">
                <input type="text" name="sku" placeholder="Mã SP">
                <input type="text" name="fit" placeholder="Form">
                <input type="text" name="technology" placeholder="Công nghệ">
            </div>
        </div>

        <button class="btn-submit">Thêm sản phẩm</button>

    </form>

</div>
<style>
    /* FORM */
.form-container.large {
    max-width: 900px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
}

/* SECTION */
.form-section {
    margin-bottom: 25px;
}

.form-section h3 {
    font-size: 16px;
    margin-bottom: 12px;
    color: #111827;
}

/* GROUP */
.form-group {
    margin-bottom: 15px;
}

/* ROW */
.form-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

/* INPUT */
input, select, textarea {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 14px;
    transition: 0.2s;
}

input:focus, select:focus, textarea:focus {
    border-color: #6366f1;
    outline: none;
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
/* BACK BUTTON */
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: #374151;
    text-decoration: none;
    padding: 6px 10px;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
    transition: 0.2s;
}

.btn-back:hover {
    background: #f3f4f6;
    color: #111827;
}
</style>