<?php
extract($data ?? []);
?>

<div class="col-md-12">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Role</th>
                <th width="120">Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($users)) : ?>
                <?php foreach ($users as $u) : ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= $u['user_name'] ?></td>
                        <td>
                            <?php if ($u['id_role'] == 2) : ?>
                                <span class="badge bg-danger">Admin</span>
                            <?php else : ?>
                                <span class="badge bg-secondary">User</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Xóa tài khoản này?')"
                                href="?mode=admin&action=user-delete&id=<?= $u['id'] ?>"
                                class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">Chưa có tài khoản</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>