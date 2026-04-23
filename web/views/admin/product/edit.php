<?php extract($data ?? []); ?>

<div class="form-container large">

    <div class="form-header">
        <h2>Sửa sản phẩm</h2>
        <a href="?mode=admin&action=product-list" class="btn-back">← Quay lại</a>
    </div>

    <?php if (!empty($error)) : ?>
        <div class="form-error"><?= $error ?></div>
    <?php endif; ?>

    <form action="?mode=admin&action=product-update" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $product['id'] ?? '' ?>">
        <input type="hidden" name="old_image" value="<?= $product['image'] ?? '' ?>">

        <!-- BASIC -->
        <div class="form-section">
            <h3>Thông tin cơ bản</h3>

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="<?= $product['name'] ?? '' ?>" required>
            </div>

            <div class="form-row">
                <select name="category_id" required>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"
                            <?= $product['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                            <?= $cat['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="number" name="price" value="<?= $product['price'] ?? 0 ?>" required>
                <input type="number" name="quantity" value="<?= $product['quantity'] ?? 0 ?>" required>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="form-section">
            <h3>Hình ảnh</h3>

            <div class="image-preview">
                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($product['image'] ?? '') ?>">
            </div>

            <input type="file" name="image">

            <div class="gallery">
                <?php foreach (($images ?? []) as $img): ?>
                    <div class="img-box">
                        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $img['image_url'] ?>">

                        <a href="?mode=admin&action=delete-image&id=<?= $img['id'] ?>&product_id=<?= $product['id'] ?>"
                           class="btn-delete">✕</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <input type="file" name="images[]" multiple>
        </div>

        <!-- DESCRIPTION -->
        <div class="form-section">
            <h3>Mô tả</h3>
            <textarea name="description"><?= $product['description'] ?? '' ?></textarea>
        </div>

        <!-- EXTRA -->
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

        <button class="btn-submit update">Cập nhật sản phẩm</button>

    </form>

</div>
<style>
 /* ===== FORM CONTAINER ===== */
.form-container.large {
    max-width: 900px;
    margin: 40px auto;
    background: #ffffff;
    padding: 30px;
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
    color: #111827;
}

/* ===== BACK BUTTON ===== */
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
}

.btn-back:hover {
    background: #f3f4f6;
}

/* ===== ERROR ===== */
.form-error {
    background: #fef2f2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* ===== SECTION ===== */
.form-section {
    margin-bottom: 25px;
}

.form-section h3 {
    font-size: 16px;
    margin-bottom: 10px;
    color: #111827;
}

/* ===== GROUP ===== */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-size: 13px;
    margin-bottom: 5px;
    color: #374151;
}

/* ===== INPUT ===== */
.form-container input,
.form-container select,
.form-container textarea {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    font-size: 14px;
    background: #fff;
    transition: 0.2s;
}

.form-container input:focus,
.form-container select:focus,
.form-container textarea:focus {
    border-color: #6366f1;
    outline: none;
}

/* ===== ROW ===== */
.form-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

/* ===== IMAGE PREVIEW ===== */
.form-container .image-preview img {
    width: 120px !important;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    margin-bottom: 10px;
}

/* ===== GALLERY ===== */
.form-container .gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 10px 0;
}

.form-container .img-box {
    position: relative;
}

.form-container .img-box img {
    width: 80px !important;
    height: 80px !important;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

/* ===== DELETE IMAGE ===== */
.btn-delete {
    position: absolute;
    top: -6px;
    right: -6px;
    background: #ef4444;
    color: white;
    font-size: 12px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    text-align: center;
    line-height: 20px;
    text-decoration: none;
}

/* ===== FILE INPUT ===== */
.form-container input[type="file"] {
    margin-top: 10px;
}

/* ===== BUTTON ===== */
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

/* UPDATE BUTTON */
.btn-submit.update {
    background: #2563eb;
}

.btn-submit.update:hover {
    background: #1d4ed8;
}
</style>