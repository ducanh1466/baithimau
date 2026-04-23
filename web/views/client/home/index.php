<?php extract($data ?? []); ?>

<div class="home-container">

    <!-- VIDEO -->
    <div class="video-box">
        <iframe src="https://www.youtube.com/embed/OXZ45SRe21Y"
            allowfullscreen>
        </iframe>
    </div>

    <!-- TITLE -->
    <h3 class="section-title">🔥 Sản phẩm được yêu thích</h3>

    <!-- PRODUCT GRID -->
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

    <!-- ABOUT -->
    <div class="about-box">
        <h4>⚽ Về chúng tôi</h4>
        <p>
            Shop chuyên cung cấp đồ bóng đá chính hãng, giá tốt, chất lượng cao.
            Cam kết uy tín - giao hàng toàn quốc.
        </p>
    </div>

    <!-- SERVICE -->
    <div class="service-grid">

        <div class="service-item">
            🚚 <br> Giao hàng toàn quốc
        </div>

        <div class="service-item">
            💯 <br> Hàng chính hãng
        </div>

        <div class="service-item">
            🔄 <br> Đổi trả dễ dàng
        </div>

    </div>

</div>


<style>

/* ===== CONTAINER ===== */
.home-container {
    max-width: 1200px;
    margin: 40px auto;
    font-family: Arial, sans-serif;
}

/* ===== VIDEO ===== */
.video-box {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 50px;
}

.video-box iframe {
    width: 100%;
    height: 500px;
    border: none;
}

/* ===== TITLE ===== */
.section-title {
    text-align: center;
    font-size: 22px;
    margin-bottom: 25px;
}

/* ===== PRODUCT GRID ===== */
.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
}

/* ===== CARD ===== */
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

/* IMAGE */
.product-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

/* BADGE */
.badge-hot {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #ef4444;
    color: white;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 6px;
}

/* BODY */
.card-body {
    padding: 12px;
}

/* NAME */
.product-name {
    font-size: 14px;
    margin-bottom: 5px;
}

/* PRICE */
.product-price {
    color: #e11d48;
    font-weight: 600;
    margin-bottom: 10px;
}

/* BUTTON */
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

/* ===== ABOUT ===== */
.about-box {
    background: white;
    padding: 30px;
    border-radius: 16px;
    text-align: center;
    margin: 50px auto;
    max-width: 700px;
    border: 1px solid #eee;
}

/* ===== SERVICE ===== */
.service-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.service-item {
    background: white;
    padding: 20px;
    border-radius: 14px;
    border: 1px solid #eee;
    text-align: center;
    transition: 0.2s;
}

.service-item:hover {
    transform: translateY(-5px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {

    .product-grid {
        grid-template-columns: 1fr 1fr;
    }

    .service-grid {
        grid-template-columns: 1fr;
    }

    .video-box iframe {
        height: 250px;
    }
}

</style>