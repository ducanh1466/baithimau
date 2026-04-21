<?php extract($data ?? []); ?>

<h5 class="mb-3">Kết quả tìm kiếm: "<?= $keyword ?>"</h5>

<div class="row">

<?php if (!empty($products)): ?>
    <?php foreach ($products as $item): ?>
        <div class="col-md-3 mb-4">
            <div class="product-card p-2 bg-white rounded shadow-sm">

                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>" class="w-100">

                <div class="p-2">
                    <h6><?= $item['name'] ?></h6>

                    <div class="text-danger fw-bold">
                        <?= number_format($item['price']) ?>đ
                    </div>

                    <a href="?mode=client&action=product-detail&id=<?= $item['id'] ?>"
                       class="btn btn-dark btn-sm mt-2 w-100">
                        Xem sản phẩm
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>

<?php else: ?>

    <div class="alert alert-warning">
        Không tìm thấy sản phẩm phù hợp.
    </div>

<?php endif; ?>

</div>