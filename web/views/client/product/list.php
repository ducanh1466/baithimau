<?php
extract($data ?? []);
?>

<div class="col-md-3">
    <div class="list-group">
        <a href="?mode=client&action=product-list"
            class="list-group-item list-group-item-action">
            Tất cả sản phẩm
        </a>

        <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $cat) : ?>
                <a href="?mode=client&action=product-list&category_id=<?= $cat['id'] ?>"
                    class="list-group-item list-group-item-action">
                    <?= $cat['name'] ?? '' ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="col-md-9">
    <div class="row">
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $item) : ?>
                <div class="col-md-4 mb-4">
                    <div class="product-card">

    <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>">

    <div class="p-3">

        <div class="product-name">
            <?= $item['name'] ?>
        </div>

        <div class="product-price">
            <?= number_format($item['price']) ?> VNĐ
        </div>

        <div class="d-flex gap-2 mt-2">
            <a href="?mode=client&action=product-detail&id=<?= $item['id'] ?>"
               class="btn btn-detail w-50">
               Chi tiết
            </a>

            <a href="?mode=client&action=cart-add&id=<?= $item['id'] ?>"
               class="btn btn-cart w-50">
               Thêm giỏ
            </a>
        </div>

    </div>

</div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="alert alert-warning">
                Không có sản phẩm nào.
            </div>
        <?php endif; ?>
    </div>
</div>