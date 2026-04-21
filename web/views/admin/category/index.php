<?php
extract($data ?? []);
?>

<div class="col-md-12">

    <a href="?mode=admin&action=category-create" class="btn btn-success mb-3">
        + Thêm danh mục
    </a>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th width="180">Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($categories)) : ?>
                <?php foreach ($categories as $cat) : ?>
                    <tr>
                        <td><?= $cat['id'] ?></td>
                        <td><?= $cat['name'] ?></td>
                        <td>
                            <a href="?mode=admin&action=category-edit&id=<?= $cat['id'] ?>" class="btn btn-warning btn-sm">
                                Sửa
                            </a>

                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                                href="?mode=admin&action=category-delete&id=<?= $cat['id'] ?>"
                                class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Chưa có danh mục</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>