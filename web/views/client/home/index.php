<?php extract($data ?? []); ?>

<!-- VIDEO -->

<div class="ratio ratio-16x9 mb-5">
    <iframe width="560" 
    height="315" 
    src="https://www.youtube.com/embed/OXZ45SRe21Y?si=cjbfUYs3DMREpdjL" 
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    referrerpolicy="strict-origin-when-cross-origin" 
    allowfullscreen>
    </iframe>
</div>
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

<!-- GIỚI THIỆU -->
<div class="bg-white p-4 rounded shadow-sm mb-4  text-center" style="max-width: 700px; margin: auto;">
    <h4>⚽ Về chúng tôi</h4>
    <p>
        Shop chuyên cung cấp đồ bóng đá chính hãng, giá tốt, chất lượng cao.
        Cam kết uy tín - giao hàng toàn quốc.
    </p>
</div>


<!-- DỊCH VỤ -->
<div class="row text-center mb-5">

    <div class="col-md-4">
        <div class="p-3 bg-white rounded shadow-sm">
            🚚 Giao hàng toàn quốc
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-3 bg-white rounded shadow-sm">
            💯 Hàng chính hãng
        </div>
    </div>

    <div class="col-md-4">
        <div class="p-3 bg-white rounded shadow-sm">
            🔄 Đổi trả dễ dàng
        </div>
    </div>

</div>