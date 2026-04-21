<?php
extract($data ?? []);
?>

<div class="col-md-6 offset-md-3">

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Thêm danh mục</h5>
        </div>

        <div class="card-body">
            <form action="?mode=admin&action=category-store" method="POST">
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Thêm mới
                </button>
            </form>
        </div>
    </div>

</div>