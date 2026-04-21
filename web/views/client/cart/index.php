<?php
extract($data ?? []);
?>

<div class="col-md-12">

    <?php if (empty($cart)) : ?>
        <div class="alert alert-warning">
            Giỏ hàng đang trống.
        </div>

        <a href="?mode=client&action=product-list" class="btn btn-primary">
            Tiếp tục mua hàng
        </a>

    <?php else : ?>

        <form action="?mode=client&action=cart-update" method="POST">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th width="120">Số lượng</th>
                        <th>Tổng</th>
                        <th width="100">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $total = 0; ?>

                    <?php foreach ($cart as $item) : ?>
                        <?php
                        $price = $item['price'] ?? 0;
                        $quantity = $item['quantity'] ?? 0;
                        $sub = $price * $quantity;
                        $total += $sub;
                        ?>

                        <tr>
                            <td>
                                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>" width="80">
                            </td>

                            <td><?= $item['name'] ?? '' ?></td>

                            <td><?= number_format($price) ?> VNĐ</td>

                            <td>
                                <input type="number" min="1"
                                    name="quantity[<?= $item['id'] ?>]"
                                    value="<?= $quantity ?>"
                                    class="form-control">
                            </td>

                            <td class="text-danger fw-bold">
                                <?= number_format($sub) ?> VNĐ
                            </td>

                            <td>
                                <a onclick="return confirm('Xóa sản phẩm này?')"
                                    href="?mode=client&action=cart-delete&id=<?= $item['id'] ?>"
                                    class="btn btn-danger btn-sm">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4 class="text-end">
                Tổng tiền:
                <span class="text-danger"><?= number_format($total) ?> VNĐ</span>
            </h4>

            <div class="d-flex justify-content-between">
                <a href="?mode=client&action=product-list" class="btn btn-secondary">
                    Tiếp tục mua
                </a>

                <div>
                    <button type="submit" class="btn btn-warning">
                        Cập nhật giỏ hàng
                    </button>

                    <a href="?mode=client&action=checkout" class="btn btn-success">
                        Thanh toán
                    </a>
                </div>
            </div>
        </form>

    <?php endif; ?>

</div>