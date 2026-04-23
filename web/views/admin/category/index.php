<?php extract($data ?? []); ?>

<div class="admin-container">

    <div class="header">
        <h2>Danh mục</h2>
        <a href="?mode=admin&action=category-create" class="btn-add">
            + Thêm danh mục
        </a>
    </div>

    <table class="admin-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($categories)) : ?>
                <?php foreach ($categories as $cat) : ?>
                    <tr>
                        <td>#<?= $cat['id'] ?></td>
                        <td><?= $cat['name'] ?></td>
                        <td class="actions">

                            <a href="?mode=admin&action=category-edit&id=<?= $cat['id'] ?>" 
                               class="btn edit">Sửa</a>

                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                               href="?mode=admin&action=category-delete&id=<?= $cat['id'] ?>" 
                               class="btn delete">Xóa</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="empty">Chưa có danh mục</td>
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
    box-shadow: 0 10px 40px rgba(0,0,0,0.05);
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
    color: #1e293b;
}

/* ADD BUTTON */
.btn-add {
    padding: 10px 16px;
    border-radius: 8px;
    background: linear-gradient(135deg,#6366f1,#4f46e5);
    color: white;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px rgba(99,102,241,0.3);
}

/* TABLE */
.admin-table {
    width: 100%;
    border-collapse: collapse;
}

/* HEAD */
.admin-table thead {
    background: #f1f5f9;
}

.admin-table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    color: #64748b;
}

/* BODY */
.admin-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #e5e7eb;
}

/* HOVER */
.admin-table tbody tr:hover {
    background: #f9fafb;
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
    transition: 0.2s;
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
    color: #94a3b8;
}
</style>