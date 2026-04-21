<?php
extract($data ?? []);
?>

<div class="col-md-6">

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thông tin thanh toán</h5>
        </div>

        <div class="card-body">
            <form action="?mode=client&action=checkout-handle" method="POST">

                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Xác nhận đặt hàng
                </button>
            </form>
        </div>
    </div>

</div>

<div class="col-md-6">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Đơn hàng của bạn</h5>
        </div>

        <div class="card-body">
            <?php if (!empty($cart)) : ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
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
                                <td><?= $item['name'] ?? '' ?></td>
                                <td><?= $quantity ?></td>
                                <td><?= number_format($sub) ?> VNĐ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <h5 class="text-end">
                    Tổng tiền:
                    <span class="text-danger"><?= number_format($total) ?> VNĐ</span>
                </h5>
            <?php else : ?>
                <div class="alert alert-warning">
                    Giỏ hàng đang trống.
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>