<?php extract($data ?? []); ?>

<div class="product-detail">

<!-- LEFT: IMAGE -->
<div>

<?php
if (!empty($images)) {
    $mainImg = $images[0]['image_url'];
} else {
    $mainImg = $product['image'];
}
?>

<img id="main-img"
     src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $mainImg ?>">

<div class="thumb-list">
<?php if (!empty($images)): ?>
    <?php foreach ($images as $img): ?>
        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $img['image_url'] ?>" class="thumb">
    <?php endforeach; ?>
<?php else: ?>
    <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $product['image'] ?>" class="thumb">
<?php endif; ?>
</div>

</div>

<!-- RIGHT: INFO -->
<div class="product-info">

    <h3><?= $product['name'] ?></h3>

    <div class="product-price">
        <?= number_format($product['price']) ?>đ
    </div>

    <div class="rating">⭐⭐⭐⭐⭐ (4.8)</div>

    <!-- SIZE -->
    <div class="size">
        <b>Chọn size:</b>
        <div id="size-box">
            <?php foreach (['S','M','L','XL','2XL','3XL'] as $s): ?>
                <button type="button" class="size-btn" data-size="<?= $s ?>">
                    <?= $s ?>
                </button>
            <?php endforeach; ?>
        </div>
        <input type="hidden" id="selected-size">
    </div>

    <!-- BUTTON -->
    <div class="action">
        <a href="#" id="add-cart" class="btn-buy">Mua ngay</a>

        <?php
        $isFavorite = in_array($product['id'], $_SESSION['favorite'] ?? []);
        ?>

        <a href="?mode=client&action=favorite&id=<?= $product['id'] ?>"
           class="btn-fav">
            <?= $isFavorite ? '❤️ Đã thích' : '🤍 Yêu thích' ?>
        </a>
    </div>

</div>

</div>

<!-- DESCRIPTION -->
<div class="section">
    <h4>Mô tả sản phẩm</h4>
    <p><?= $product['description'] ?></p>
</div>

<!-- INFO TABLE -->
<div class="section">

<h4>Thông tin chi tiết</h4>

<table class="product-table">
<tr><th>Màu</th><td><?= $product['color'] ?? '...' ?></td></tr>
<tr><th>Chất liệu</th><td><?= $product['material'] ?? '...' ?></td></tr>
<tr><th>Thương hiệu</th><td><?= $product['brand'] ?? '...' ?></td></tr>
<tr><th>Mã</th><td><?= $product['sku'] ?? '...' ?></td></tr>
<tr><th>Form</th><td><?= $product['fit'] ?? '...' ?></td></tr>
<tr><th>Công nghệ</th><td><?= $product['technology'] ?? '...' ?></td></tr>
</table>

</div>

<!-- COMMENT -->
<div class="section">

<h4>Đánh giá</h4>

<form action="?mode=client&action=comment" method="POST" class="comment-box">

<input type="hidden" name="product_id" value="<?= $product['id'] ?>">

<input type="text" name="user_name" placeholder="Tên..." required>
<textarea name="content" placeholder="Nhận xét..." required></textarea>

<select name="rating">
<option value="5">⭐⭐⭐⭐⭐</option>
<option value="4">⭐⭐⭐⭐</option>
<option value="3">⭐⭐⭐</option>
<option value="2">⭐⭐</option>
<option value="1">⭐</option>
</select>

<button>Gửi</button>

</form>

<?php foreach (($comments ?? []) as $c): ?>
<div class="comment-item">
<b><?= $c['user_name'] ?></b>
<div class="star"><?= str_repeat("⭐", $c['rating']) ?></div>
<p><?= $c['content'] ?></p>
<small><?= $c['created_at'] ?></small>
</div>
<?php endforeach; ?>

</div>

<!-- RELATED -->
<div class="section">

<h4>Sản phẩm liên quan</h4>

<div class="related">

<?php foreach (($related ?? []) as $item): ?>
<div class="product-card">
<img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $item['image'] ?>">
<div>
<p><?= $item['name'] ?></p>
<span><?= number_format($item['price']) ?>đ</span>
</div>
</div>
<?php endforeach; ?>

</div>

</div>

<!-- SCRIPT -->
<script>
document.querySelectorAll('.thumb').forEach(img => {
    img.onclick = () => document.getElementById('main-img').src = img.src;
});

document.querySelectorAll('.size-btn').forEach(btn => {
    btn.onclick = function() {
        document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        document.getElementById('selected-size').value = this.dataset.size;
    }
});

document.getElementById('add-cart').onclick = function(e){
    e.preventDefault();
    let size = document.getElementById('selected-size').value;
    if(!size){ alert("Chọn size"); return; }
    window.location.href = `?mode=client&action=cart-add&id=<?= $product['id'] ?>&size=${size}`;
}
</script>

<!-- CSS -->
<style>

/* ===== LAYOUT ===== */
.product-detail {
    max-width: 1100px;
    margin: 60px auto;
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 50px;
}

/* ===== IMAGE ===== */
#main-img {
    width: 100%;
    border-radius: 14px;
    object-fit: cover;
}

.thumb-list {
    display: flex;
    gap: 12px;
    margin-top: 12px;
}

.thumb {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: 0.2s;
}

.thumb:hover {
    border-color: #111;
}

/* ===== INFO ===== */
.product-info h3 {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 10px;
}

.product-price {
    font-size: 26px;
    font-weight: 700;
    color: #e11d48;
    margin-bottom: 10px;
}

.rating {
    color: #f59e0b;
    margin-bottom: 15px;
}

/* ===== SIZE ===== */
.size {
    margin-top: 20px;
}

#size-box {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.size-btn {
    padding: 8px 14px;
    border-radius: 8px;
    border: 1px solid #ddd;
    background: white;
    cursor: pointer;
    font-size: 13px;
    transition: 0.2s;
}

.size-btn:hover {
    border-color: #111;
}

.size-btn.active {
    background: #111;
    color: white;
    border-color: #111;
}

/* ===== BUTTON ===== */
.action {
    display: flex;
    gap: 12px;
    margin-top: 25px;
}

.btn-buy {
    flex: 1;
    background: #111;
    color: white;
    padding: 14px;
    text-align: center;
    border-radius: 10px;
    font-weight: 500;
    transition: 0.2s;
}

.btn-buy:hover {
    background: #000;
}

.btn-fav {
    flex: 1;
    border: 1px solid #ddd;
    padding: 14px;
    text-align: center;
    border-radius: 10px;
    color: #111;
    transition: 0.2s;
}

.btn-fav:hover {
    border-color: #111;
}

/* ===== SECTION ===== */
.section {
    max-width: 1100px;
    margin: 50px auto;
}

.section h4 {
    font-size: 18px;
    margin-bottom: 15px;
}

/* ===== DESCRIPTION ===== */
.section p {
    color: #444;
    line-height: 1.6;
}

/* ===== TABLE ===== */
.product-table {
    width: 100%;
    border-collapse: collapse;
}

.product-table th {
    text-align: left;
    padding: 12px;
    background: #f9fafb;
    width: 200px;
    color: #555;
}

.product-table td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

/* ===== COMMENT ===== */
.comment-box {
    border: 1px solid #eee;
    padding: 15px;
    border-radius: 12px;
}

.comment-box input,
.comment-box textarea,
.comment-box select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.comment-box button {
    background: #111;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 8px;
}

/* ===== COMMENT ITEM ===== */
.comment-item {
    border: 1px solid #eee;
    padding: 12px;
    border-radius: 10px;
    margin-top: 12px;
}

.comment-item b {
    font-size: 14px;
}

.comment-item p {
    margin: 5px 0;
}

/* ===== RELATED ===== */
.related {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.product-card {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #eee;
    transition: 0.2s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-card div {
    padding: 10px;
}

.product-card span {
    color: #e11d48;
    font-weight: 600;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .product-detail {
        grid-template-columns: 1fr;
    }

    .related {
        grid-template-columns: 1fr 1fr;
    }
}

</style>