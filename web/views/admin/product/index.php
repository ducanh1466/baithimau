<?php extract($data ?? []); ?>

<div class="admin-container">

    <div class="header">
        <h2>Sản phẩm</h2>
        <a href="?mode=admin&action=product-create" class="btn-add">
            + Thêm sản phẩm
        </a>
    </div>

    <table class="admin-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $item) : ?>
                    <tr>
                        <td>#<?= $item['id'] ?></td>

                        <td>
                            <img class="product-img"
                                src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>">
                        </td>

                        <td class="product-name"><?= $item['name'] ?? '' ?></td>

                        <td>
                            <span class="badge">
                                <?= $item['category_name'] ?? '' ?>
                            </span>
                        </td>

                        <td class="price">
                            <?= number_format($item['price'] ?? 0) ?> ₫
                        </td>

                        <td><?= $item['quantity'] ?? 0 ?></td>

                        <td class="actions">
                            <a href="?mode=admin&action=product-edit&id=<?= $item['id'] ?>" class="btn edit">Sửa</a>

                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                               href="?mode=admin&action=product-delete&id=<?= $item['id'] ?>" 
                               class="btn delete">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="empty">Chưa có sản phẩm</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>

</div>
<style>
    /* CONTAINER */
.admin-container {
    background: white;
    padding: 25px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
}

/* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h2 {
    font-size: 20px;
    color: #111827;
}

/* ADD BUTTON */
.btn-add {
    padding: 10px 16px;
    border-radius: 8px;
    background: #111827;
    color: white;
    text-decoration: none;
    font-size: 14px;
    transition: 0.2s;
}

.btn-add:hover {
    background: #000;
}

/* TABLE */
.admin-table {
    width: 100%;
    border-collapse: collapse;
}

/* HEAD */
.admin-table thead {
    background: #f9fafb;
}

.admin-table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    color: #6b7280;
}

/* BODY */
.admin-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: middle;
}

/* HOVER */
.admin-table tbody tr:hover {
    background: #f9fafb;
}

/* IMAGE */
.product-img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

/* NAME */
.product-name {
    font-weight: 500;
    color: #111827;
}

/* CATEGORY */
.badge {
    background: #eef2ff;
    color: #4338ca;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
}

/* PRICE */
.price {
    color: #dc2626;
    font-weight: 600;
}

/* ACTION */
.actions {
    display: flex;
    gap: 8px;
}

/* BUTTON */
.btn {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    text-decoration: none;
}

/* EDIT */
.btn.edit {
    background: #f59e0b;
    color: white;
}

.btn.edit:hover {
    background: #d97706;
}

/* DELETE */
.btn.delete {
    background: #ef4444;
    color: white;
}

.btn.delete:hover {
    background: #dc2626;
}

/* EMPTY */
.empty {
    text-align: center;
    padding: 20px;
    color: #9ca3af;
}
</style>