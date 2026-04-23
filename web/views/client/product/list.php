<div class="shop-container">

    <!-- SIDEBAR -->
    <div class="shop-sidebar">

        <h3>Danh mục</h3>

        <a href="?mode=client&action=product-list" class="category-item active">
            Tất cả sản phẩm
        </a>

        <?php foreach ($categories as $cat): ?>
            <a href="?mode=client&action=product-list&category_id=<?= $cat['id'] ?>"
               class="category-item">
               <?= $cat['name'] ?>
            </a>
        <?php endforeach; ?>

    </div>

    <!-- PRODUCTS -->
    <div class="shop-products">

        <?php if (!empty($products)) : ?>

            <?php foreach ($products as $item): ?>

                <div class="product-card">

                    <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $item['image'] ?>">

                    <div class="card-body">

                        <p class="product-name"><?= $item['name'] ?></p>

                        <p class="product-price">
                            <?= number_format($item['price']) ?>₫
                        </p>

                        <div class="card-action">

                            <a href="?mode=client&action=product-detail&id=<?= $item['id'] ?>"
                               class="btn-outline">
                                Chi tiết
                            </a>

                            <a href="?mode=client&action=cart-add&id=<?= $item['id'] ?>"
                               class="btn-primary">
                                Thêm giỏ
                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else : ?>
            <p class="empty">Không có sản phẩm</p>
        <?php endif; ?>

    </div>

</div>
<style>
    /* ===== LAYOUT ===== */
.shop-container {
    max-width: 1200px;
    margin: 40px auto;
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: 30px;
}

/* ===== SIDEBAR ===== */
.shop-sidebar {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #eee;
}

.shop-sidebar h3 {
    margin-bottom: 15px;
    font-size: 16px;
}

.category-item {
    display: block;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    color: #111;
    font-size: 14px;
    transition: 0.2s;
}

.category-item:hover {
    background: #f3f4f6;
}

.category-item.active {
    background: #111;
    color: white;
}

/* ===== PRODUCT GRID ===== */
.shop-products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

/* ===== CARD ===== */
.product-card {
    background: white;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #eee;
    transition: 0.25s;
}

.product-card:hover {
    transform: translateY(-5px);
}

/* IMAGE */
.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

/* BODY */
.card-body {
    padding: 12px;
}

/* NAME */
.product-name {
    font-size: 14px;
    margin-bottom: 6px;
}

/* PRICE */
.product-price {
    color: #e11d48;
    font-weight: 600;
    margin-bottom: 10px;
}

/* ACTION */
.card-action {
    display: flex;
    gap: 8px;
}

/* BUTTON */
.btn-primary {
    flex: 1;
    background: #111;
    color: white;
    padding: 8px;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    font-size: 13px;
}

.btn-primary:hover {
    background: #000;
}

.btn-outline {
    flex: 1;
    border: 1px solid #ddd;
    padding: 8px;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    font-size: 13px;
    color: #111;
}

.btn-outline:hover {
    border-color: #111;
}

/* EMPTY */
.empty {
    text-align: center;
    color: #6b7280;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .shop-container {
        grid-template-columns: 1fr;
    }

    .shop-products {
        grid-template-columns: 1fr 1fr;
    }
}
</style>