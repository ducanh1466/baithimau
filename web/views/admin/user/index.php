<?php extract($data ?? []); ?>

<div class="admin-container">

    <div class="header">
        <h2>Tài khoản</h2>
        <a href="?mode=admin&action=user-create" class="btn-add">
            + Thêm tài khoản
        </a>
    </div>

    <table class="admin-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td>#<?= $u['id'] ?></td>
                    <td class="user-name"><?= $u['user_name'] ?></td>
                    <td><?= $u['email'] ?? '' ?></td>

                    <!-- ROLE -->
                    <td>
                        <span class="badge <?= $u['id_role']==2 ? 'admin' : 'user' ?>">
                            <?= $u['id_role']==2 ? 'Admin' : 'User' ?>
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td>
                        <label class="switch">
                            <input type="checkbox"
                                onchange="window.location.href='?mode=admin&action=<?= $u['status']==1 ? 'user-lock' : 'user-unlock' ?>&id=<?= $u['id'] ?>'"
                                <?= $u['status']==1 ? 'checked' : '' ?>>
                            <span class="slider"></span>
                        </label>
                    </td>

                    <!-- ACTION -->
                    <td class="actions">

                        <a href="?mode=admin&action=user-edit&id=<?= $u['id'] ?>" 
                           class="btn edit">Sửa</a>

                        <a onclick="return confirm('Xóa tài khoản này?')"
                           href="?mode=admin&action=user-delete&id=<?= $u['id'] ?>" 
                           class="btn delete">Xóa</a>

                    </td>
                </tr>
            <?php endforeach; ?>
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
}

.btn-add:hover {
    background: #000;
}

/* TABLE */
.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table thead {
    background: #f9fafb;
}

.admin-table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    color: #6b7280;
}

.admin-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #e5e7eb;
}

.admin-table tbody tr:hover {
    background: #f9fafb;
}

/* USER NAME */
.user-name {
    font-weight: 500;
    color: #111827;
}

/* BADGE */
.badge {
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
}

.badge.admin {
    background: #fee2e2;
    color: #dc2626;
}

.badge.user {
    background: #e5e7eb;
    color: #374151;
}

/* SWITCH */
.switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 22px;
}

.switch input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    background: #d1d5db;
    border-radius: 22px;
    inset: 0;
    transition: .3s;
}

.slider:before {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    left: 3px;
    top: 3px;
    background: white;
    border-radius: 50%;
    transition: .3s;
}

.switch input:checked + .slider {
    background: #22c55e;
}

.switch input:checked + .slider:before {
    transform: translateX(18px);
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
    background: #3b82f6;
    color: white;
}

.btn.edit:hover {
    background: #2563eb;
}

/* DELETE */
.btn.delete {
    background: #ef4444;
    color: white;
}

.btn.delete:hover {
    background: #dc2626;
}
</style>