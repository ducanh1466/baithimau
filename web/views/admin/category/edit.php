<?php
extract($data ?? []);
?>

<div class="col-md-6 offset-md-3">

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Sửa danh mục</h5>
        </div>

        <div class="card-body">
            <form action="?mode=admin&action=category-update" method="POST">
                <input type="hidden" name="id" value="<?= $category['id'] ?? '' ?>">

                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="name" class="form-control"
                        value="<?= $category['name'] ?? '' ?>" required>
                </div>

                <button type="submit" class="btn btn-warning w-100">
                    Cập nhật
                </button>
            </form>
        </div>
    </div>

</div>