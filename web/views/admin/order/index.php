<?php
extract($data ?? []);
?>

<div class="col-md-12">

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th width="220">Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($orders)) : ?>
                <?php foreach ($orders as $o) : ?>
                    <tr>
                        <td><?= $o['id'] ?></td>
                        <td><?= $o['user_name'] ?? '' ?></td>
                        <td class="text-danger fw-bold"><?= number_format($o['total_price'] ?? 0) ?> VNĐ</td>
                        <td>
                            <?php
                            $status = $o['status'] ?? 0;
                            if ($status == 0) echo "<span class='badge bg-warning'>Chờ xác nhận</span>";
                            else if ($status == 1) echo "<span class='badge bg-primary'>Đang giao</span>";
                            else if ($status == 2) echo "<span class='badge bg-success'>Hoàn thành</span>";
                            else echo "<span class='badge bg-danger'>Hủy</span>";
                            ?>
                        </td>
                        <td><?= $o['created_at'] ?? '' ?></td>
                        <td>
                            <a href="?mode=admin&action=order-detail&id=<?= $o['id'] ?>" class="btn btn-info btn-sm">
                                Chi tiết
                            </a>

                            <form action="?mode=admin&action=order-update" method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= $o['id'] ?>">

                                <select name="status" class="form-select form-select-sm d-inline-block" style="width:120px;">
                                    <option value="0" <?= ($status == 0) ? "selected" : "" ?>>Chờ</option>
                                    <option value="1" <?= ($status == 1) ? "selected" : "" ?>>Đang giao</option>
                                    <option value="2" <?= ($status == 2) ? "selected" : "" ?>>Hoàn thành</option>
                                    <option value="3" <?= ($status == 3) ? "selected" : "" ?>>Hủy</option>
                                </select>

                                <button type="submit" class="btn btn-success btn-sm">
                                    Cập nhật
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center">Chưa có đơn hàng</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>