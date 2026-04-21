<?php
extract($data ?? []);
?>

<div class="col-md-8 offset-md-2">

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Sửa sản phẩm</h5>
        </div>

        <div class="card-body">
            <form action="?mode=admin&action=product-update" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $product['id'] ?? '' ?>">
                <input type="hidden" name="old_image" value="<?= $product['image'] ?? '' ?>">

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control"
                        value="<?= $product['name'] ?? '' ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Danh mục</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Chọn danh mục --</option>

                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $cat) : ?>
                                <option value="<?= $cat['id'] ?>"
                                    <?= (!empty($product) && $product['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                    <?= $cat['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giá</label>
                    <input type="number" name="price" class="form-control"
                        value="<?= $product['price'] ?? 0 ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="number" name="quantity" class="form-control"
                        value="<?= $product['quantity'] ?? 0 ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ảnh hiện tại</label><br>
                    <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($product['image'] ?? '') ?>" width="120">
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn ảnh mới</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
    <label>Ảnh hiện tại</label><br>

    <?php foreach (($images ?? []) as $img): ?>
        <div style="display:inline-block; margin:5px; text-align:center">

            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $img['image_url'] ?>"
                 width="80" class="border mb-1">

            <br>

            <!-- nút xoá -->
            <a href="?mode=admin&action=delete-image&id=<?= $img['id'] ?>&product_id=<?= $product['id'] ?>"
               class="btn btn-sm btn-danger">
               Xoá
            </a>

        </div>
    <?php endforeach; ?>

</div>
            <div class="mb-3">
                <label class="form-label">Chọn ảnh mới</label>  
            <input type="file" name="images[]" multiple class="form-control">
            </div>


                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" rows="4"><?= $product['description'] ?? '' ?></textarea>
                </div>

                <button type="submit" class="btn btn-warning w-100">
                    Cập nhật sản phẩm
                </button>
            </form>
        </div>
    </div>

</div>