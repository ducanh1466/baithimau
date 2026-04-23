<?php extract($data ?? []); ?>

<div class="landing">

    <!-- HERO -->
    <div class="hero">
        <h1>⚽ VNBALL</h1>
        <p>Chuyên đồ bóng đá chính hãng - Giá tốt nhất</p>

        <a href="?mode=client&action=product-list" class="btn-hero">
            Mua ngay
        </a>
    </div>

    <!-- FEATURE -->
    <div class="feature-grid">

        <div class="feature-item">🚚 <br> Giao hàng toàn quốc</div>
        <div class="feature-item">💯 <br> Hàng chính hãng</div>
        <div class="feature-item">🔄 <br> Đổi trả dễ dàng</div>

    </div>

    <!-- PRODUCT -->
    <h3 class="section-title">🔥 Sản phẩm được yêu thích</h3>

    <div class="product-grid">
        <?php foreach ($favoriteProducts as $item): ?>
            <div class="product-card">

                <span class="badge-hot">HOT</span>

                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $item['image'] ?>">

                <div class="card-body">

                    <p class="product-name"><?= $item['name'] ?></p>

                    <p class="product-price">
                        <?= number_format($item['price']) ?>₫
                    </p>

                    <a href="?mode=client&action=product-detail&id=<?= $item['id'] ?>"
                       class="btn-buy">
                        Mua ngay
                    </a>

                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <!-- FEEDBACK -->
    <h3 class="section-title">💬 Khách hàng nói gì</h3>

    <div class="feedback-grid">

        <div class="feedback-item">
            ⭐⭐⭐⭐⭐
            <p>"Áo đẹp, chất lượng tốt!"</p>
        </div>

        <div class="feedback-item">
            ⭐⭐⭐⭐⭐
            <p>"Giao hàng nhanh, uy tín!"</p>
        </div>

        <div class="feedback-item">
            ⭐⭐⭐⭐⭐
            <p>"Sẽ ủng hộ tiếp!"</p>
        </div>

    </div>

    <!-- CTA -->
    <div class="cta">
        <a href="?mode=client&action=product-list" class="btn-cta">
            👉 Vào shop ngay
        </a>
    </div>

</div>


<style>

/* ===== CONTAINER ===== */
.landing {
    max-width: 1200px;
    margin: 40px auto;
    font-family: Arial, sans-serif;
}

/* ===== HERO ===== */
.hero {
    background: linear-gradient(135deg, #111, #333);
    color: white;
    text-align: center;
    padding: 60px 20px;
    border-radius: 20px;
}

.hero h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.hero p {
    color: #ccc;
    margin-bottom: 20px;
}

.btn-hero {
    background: #ef4444;
    padding: 12px 24px;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    font-weight: 500;
}

.btn-hero:hover {
    background: #dc2626;
}

/* ===== FEATURE ===== */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin: 40px 0;
}

.feature-item {
    background: white;
    padding: 25px;
    border-radius: 14px;
    text-align: center;
    border: 1px solid #eee;
    transition: 0.2s;
}

.feature-item:hover {
    transform: translateY(-5px);
}

/* ===== TITLE ===== */
.section-title {
    text-align: center;
    font-size: 22px;
    margin: 40px 0 20px;
}

/* ===== PRODUCT ===== */
.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
}

.product-card {
    background: white;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #eee;
    position: relative;
    transition: 0.25s;
}

.product-card:hover {
    transform: translateY(-6px);
}

.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.badge-hot {
    position: absolute;
    top: 10px;
    left: 10px;
    background: red;
    color: white;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 6px;
}

.card-body {
    padding: 12px;
}

.product-name {
    font-size: 14px;
}

.product-price {
    color: #e11d48;
    font-weight: 600;
    margin: 8px 0;
}

.btn-buy {
    display: block;
    background: #111;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
}

.btn-buy:hover {
    background: #000;
}

/* ===== FEEDBACK ===== */
.feedback-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.feedback-item {
    background: white;
    padding: 20px;
    border-radius: 14px;
    border: 1px solid #eee;
    text-align: center;
}

/* ===== CTA ===== */
.cta {
    text-align: center;
    margin-top: 40px;
}

.btn-cta {
    background: #ef4444;
    color: white;
    padding: 14px 30px;
    border-radius: 12px;
    text-decoration: none;
    font-size: 16px;
}

.btn-cta:hover {
    background: #dc2626;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {

    .product-grid {
        grid-template-columns: 1fr 1fr;
    }

    .feature-grid,
    .feedback-grid {
        grid-template-columns: 1fr;
    }

}

</style>