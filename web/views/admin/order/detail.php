<?php
extract($data ?? []);
?>

<div class="col-md-12">

    <?php if (!empty($order)) : ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Thông tin đơn hàng #<?= $order['id'] ?></h5>
            </div>

            <div class="card-body">
                <p><b>Họ tên:</b> <?= $order['full_name'] ?? '' ?></p>
                <p><b>SĐT:</b> <?= $order['phone'] ?? '' ?></p>
                <p><b>Địa chỉ:</b> <?= $order['address'] ?? '' ?></p>
                <p><b>Tổng tiền:</b> <span class="text-danger fw-bold"><?= number_format($order['total_price'] ?? 0) ?> VNĐ</span></p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Danh sách sản phẩm</h5>
            </div>

            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($details)) : ?>
                            <?php foreach ($details as $d) : ?>
                                <tr>
                                    <td>
                                        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($d['image'] ?? '') ?>" width="80">
                                    </td>
                                    <td><?= $d['product_name'] ?? '' ?></td>
                                    <td><?= number_format($d['price'] ?? 0) ?> VNĐ</td>
                                    <td><?= $d['quantity'] ?? 0 ?></td>
                                    <td class="text-danger fw-bold">
                                        <?= number_format(($d['price'] ?? 0) * ($d['quantity'] ?? 0)) ?> VNĐ
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">Không có dữ liệu chi tiết</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <a href="?mode=admin&action=order-list" class="btn btn-secondary">
                    Quay lại
                </a>
            </div>
        </div>

    <?php else : ?>
        <div class="alert alert-danger">
            Đơn hàng không tồn tại.
        </div>
    <?php endif; ?>

</div>