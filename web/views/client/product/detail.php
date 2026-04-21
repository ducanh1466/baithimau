<?php extract($data ?? []); ?>

<div class="col-md-6">

<?php
if (!empty($images)) {
    $mainImg = $images[0]['image_url'];
} else {
    $mainImg = $product['image'];
}
?>

<!-- ẢNH CHÍNH -->
<img id="main-img"
     src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $mainImg ?>"
     class="w-100 border mb-3">

<!-- ẢNH NHỎ -->
<div class="d-flex gap-2 mt-2 flex-wrap">

<?php if (!empty($images)): ?>

    <?php foreach ($images as $img): ?>
        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $img['image_url'] ?>"
             width="70"
             class="thumb">
    <?php endforeach; ?>

<?php else: ?>

    <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $product['image'] ?>"
         width="70">

<?php endif; ?>

</div>

</div>
        <!-- INFO -->
        <div class="col-md-6">

            <h3><?= $product['name'] ?></h3>

            <div class="text-danger fs-4 fw-bold">
                <?= number_format($product['price']) ?>đ
            </div>

            <!-- rating -->
            <div style="color:orange;">
                ⭐⭐⭐⭐⭐ (4.8)
            </div>

            <!-- size -->
                    <div class="mt-3">
            <b>Chọn size:</b><br>

            <div id="size-box">
                <?php foreach (['S','M','L','XL','2XL','3XL'] as $s): ?>
                    <button class="btn btn-outline-dark btn-sm size-btn" data-size="<?= $s ?>">
                        <?= $s ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <input type="hidden" id="selected-size" name="size">
        </div>

            <!-- button -->
            <div class="mt-4 d-flex gap-2">
            <a href="#" id="add-cart" class="btn btn-danger w-50">
            🛒 Thêm vào giỏ
            </a>

            <?php
            $isFavorite = in_array($product['id'], $_SESSION['favorite'] ?? []);
            ?>

            <a href="?mode=client&action=favorite&id=<?= $product['id'] ?>"
            class="btn <?= $isFavorite ? 'btn-danger' : 'btn-outline-danger' ?> w-50">
                <?= $isFavorite ? '❤️ Đã thích' : '🤍 Yêu thích' ?>
            </a>
            </div>

        </div>

    </div>

    <!-- MÔ TẢ -->
    <div class="mt-5">
        <h4>Mô tả sản phẩm</h4>
        <p><?= $product['description'] ?></p>
    </div>
    <div class="mt-5">

    <h4 class="section-title">📋 Thông tin chi tiết</h4>

    <table class="table table-bordered bg-white">

        <tr>
            <th>Màu sản phẩm</th>
            <td>White</td>
        </tr>

        <tr>
            <th>Chất liệu</th>
            <td>Chất vải dệt kim</td>
        </tr>

        <tr>
            <th>Mã sản phẩm</th>
            <td>JJ1931</td>
        </tr>

        <tr>
            <th>Chiều dài</th>
            <td>Tiêu Chuẩn</td>
        </tr>

        <tr>
            <th>Form áo</th>
            <td>Slim fit (ôm vừa người)</td>
        </tr>

        <tr>
            <th>Công nghệ</th>
            <td>AEROREADY thấm hút mồ hôi</td>
        </tr>

    </table>

</div>

    <!-- COMMENT -->
    <h4 class="mt-5">💬 Đánh giá sản phẩm</h4>

    <form action="?mode=client&action=comment" method="POST" class="bg-white p-3 rounded shadow-sm">

        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

        <input type="text" name="user_name"
            class="form-control mb-2"
            placeholder="Tên của bạn" required>

        <textarea name="content"
                class="form-control mb-2"
                placeholder="Nhận xét của bạn..." required></textarea>

        <select name="rating" class="form-control mb-2">
            <option value="5">⭐⭐⭐⭐⭐ - Rất tốt</option>
            <option value="4">⭐⭐⭐⭐ - Tốt</option>
            <option value="3">⭐⭐⭐ - Bình thường</option>
            <option value="2">⭐⭐ - Tệ</option>
            <option value="1">⭐ - Rất tệ</option>
        </select>

        <button class="btn btn-danger">Gửi đánh giá</button>
    </form>
    <div class="mt-4">

    <?php foreach (($comments ?? []) as $c): ?>

        <div class="border p-3 mt-2 rounded bg-white">

            <b><?= $c['user_name'] ?></b>

            <div style="color:orange;">
                <?= str_repeat("⭐", $c['rating']) ?>
            </div>

            <p><?= $c['content'] ?></p>

            <small><?= $c['created_at'] ?></small>

        </div>

    <?php endforeach; ?>

</div>
    <h4 class="mt-5">Sản phẩm liên quan</h4>

    <div class="row">
    <?php foreach (($related ?? []) as $item): ?>
        <div class="col-md-3">

            <div class="product-card">

                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>">

                <div class="p-2">
                    <div><?= $item['name'] ?></div>
                    <div class="text-danger"><?= number_format($item['price']) ?>đ</div>
                </div>

            </div>

        </div>
    <?php endforeach; ?>
    </div>
    <script>
    const sizeBtns = document.querySelectorAll('.size-btn');
    const sizeInput = document.getElementById('selected-size');

    sizeBtns.forEach(btn => {
        btn.onclick = function() {

            sizeBtns.forEach(b => b.classList.remove('active'));

            this.classList.add('active');
            sizeInput.value = this.dataset.size;
        }
    });
    </script>
        <script>
    document.getElementById('add-cart').onclick = function(e) {
        e.preventDefault();

        let size = document.getElementById('selected-size').value;

        if (!size) {
            alert("Vui lòng chọn size!");
            return;
        }

        window.location.href =
            `?mode=client&action=cart-add&id=<?= $product['id'] ?>&size=${size}`;
    };
    </script>
        <script>
    document.querySelectorAll('.thumb').forEach(img => {
        img.onclick = function() {
            document.getElementById('main-img').src = this.src;
        }
    });
    </script>