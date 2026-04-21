<?php extract($data ?? []); ?>

<!-- HERO -->
<div class="bg-dark text-white text-center p-5 rounded mb-5">
    <h1>⚽ Football Shop</h1>
    <p>Chuyên đồ bóng đá chính hãng - Giá tốt nhất</p>

    <a href="?mode=client&action=home-page" class="btn btn-danger btn-lg mt-3">
        Mua ngay
    </a>
</div>

<!-- ƯU ĐIỂM -->
<div class="row text-center mb-5">

    <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm">
            🚚 Giao hàng toàn quốc
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm">
            💯 Hàng chính hãng
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-white p-4 rounded shadow-sm">
            🔄 Đổi trả dễ dàng
        </div>
    </div>

</div>

<!-- SẢN PHẨM NỔI BẬT -->
<h6 class="section-title text-center mt-5 ">🔥 Sản phẩm được yêu thích</h6>

<div class="row">
<?php foreach ($favoriteProducts as $item): ?>
    <div class="col-md-3 mb-4">

        <div class="product-card position-relative">

            <span class="badge-hot">HOT</span>

            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>">

            <div class="p-3">

                <div class="product-name">
                    <?= $item['name'] ?>
                </div>

                <div class="product-price mt-1">
                    <?= number_format($item['price']) ?>đ
                </div>

                <a href="?mode=client&action=product-detail&id=<?= $item['id'] ?>"
                   class="btn btn-buy w-100 mt-2">
                    Mua ngay
                </a>

            </div>

        </div>

    </div>
<?php endforeach; ?>
</div>

<!-- FEEDBACK -->
<h3 class="section-title mt-5">💬 Khách hàng nói gì</h3>

<div class="row">
    <div class="col-md-4">
        <div class="bg-white p-3 rounded shadow-sm">
            ⭐⭐⭐⭐⭐ <br>
            "Áo đẹp, chất lượng tốt!"
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-white p-3 rounded shadow-sm">
            ⭐⭐⭐⭐⭐ <br>
            "Giao hàng nhanh, uy tín!"
        </div>
    </div>

    <div class="col-md-4">
        <div class="bg-white p-3 rounded shadow-sm">
            ⭐⭐⭐⭐⭐ <br>
            "Sẽ ủng hộ tiếp!"
        </div>
    </div>
</div>

<!-- CTA -->
<div class="text-center mt-5">
    <a href="?mode=client&action=home-page" class="btn btn-danger btn-lg">
        👉 Vào shop ngay
    </a>
</div>