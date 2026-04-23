<?php extract($data ?? []); ?>

<div class="cart-container">

<?php if (empty($cart)) : ?>

    <div class="cart-empty">
        <p>Giỏ hàng đang trống</p>
        <a href="?mode=client&action=product-list" class="btn-primary">
            Tiếp tục mua hàng
        </a>
    </div>

<?php else : ?>

<form action="?mode=client&action=cart-update" method="POST">

    <table class="cart-table">

        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            <?php $total = 0; ?>

            <?php foreach ($cart as $item): ?>
                <?php
                $price = $item['price'];
                $quantity = $item['quantity'];
                $sub = $price * $quantity;
                $total += $sub;
                ?>

                <tr>
                    <td class="product-info">

                        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . $item['image'] ?>">

                        <div>
                            <p class="name"><?= $item['name'] ?></p>
                        </div>

                    </td>

                    <td class="price"><?= number_format($price) ?> ₫</td>

                    <td>
                        <input type="number" min="1"
                            name="quantity[<?= $item['id'] ?>]"
                            value="<?= $quantity ?>">
                    </td>

                    <td class="subtotal"><?= number_format($sub) ?> ₫</td>

                    <td>
                        <a onclick="return confirm('Xóa sản phẩm?')"
                           href="?mode=client&action=cart-delete&id=<?= $item['id'] ?>"
                           class="btn-delete">✕</a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <!-- TOTAL -->
    <div class="cart-footer">

        <div class="total">
            Tổng: <span><?= number_format($total) ?> ₫</span>
        </div>

        <div class="actions">
            <a href="?mode=client&action=product-list" class="btn-dark">
                Tiếp tục mua
            </a>

            <a href="?mode=client&action=checkout" class="btn-primary">
                Thanh toán
            </a>
        </div>

    </div>

</form>

<?php endif; ?>

</div>
<style>
    /* CONTAINER */
.cart-container {
    max-width: 1000px;
    margin: 40px auto;
}

/* EMPTY */
.cart-empty {
    text-align: center;
    padding: 40px;
}

.cart-empty p {
    margin-bottom: 15px;
    color: #6b7280;
}

/* TABLE */
.cart-table {
    width: 100%;
    border-collapse: collapse;
}

.cart-table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    color: #6b7280;
}

.cart-table td {
    padding: 16px 12px;
    border-bottom: 1px solid #e5e7eb;
}

/* PRODUCT */
.product-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.product-info img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 8px;
}

.name {
    font-weight: 500;
}

/* PRICE */
.price {
    color: #374151;
}

.subtotal {
    color: #dc2626;
    font-weight: 600;
}

/* INPUT */
input[type="number"] {
    width: 60px;
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #d1d5db;
}

/* DELETE */
.btn-delete {
    color: #ef4444;
    text-decoration: none;
    font-size: 18px;
}

/* FOOTER */
.cart-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

/* TOTAL */
.total span {
    font-size: 18px;
    color: #dc2626;
    font-weight: 600;
}

/* BUTTONS */
.btn-primary {
    background: #111827;
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    text-decoration: none;
}

.btn-dark {
    background: #374151;
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    border: none;
}

.btn-light {
    background: #f3f4f6;
    color: #111827;
    padding: 10px 16px;
    border-radius: 8px;
    text-decoration: none;
}

.actions {
    display: flex;
    gap: 10px;
}
</style>