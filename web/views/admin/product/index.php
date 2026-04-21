<?php
extract($data ?? []);
?>

<div class="col-md-12">

    <a href="?mode=admin&action=product-create" class="btn btn-success mb-3">
        + Thêm sản phẩm
    </a>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th width="200">Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $item) : ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td>
                            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>" width="80">
                        </td>
                        <td><?= $item['name'] ?? '' ?></td>
                        <td><?= $item['category_name'] ?? '' ?></td>
                        <td class="text-danger fw-bold"><?= number_format($item['price'] ?? 0) ?> VNĐ</td>
                        <td><?= $item['quantity'] ?? 0 ?></td>
                        <td>
                            <a href="?mode=admin&action=product-edit&id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">
                                Sửa
                            </a>

                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                                href="?mode=admin&action=product-delete&id=<?= $item['id'] ?>"
                                class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Chưa có sản phẩm</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>