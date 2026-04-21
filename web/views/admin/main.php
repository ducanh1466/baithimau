<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="?mode=admin&action=/">ADMIN PANEL</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuAdmin">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuAdmin">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?mode=admin&action=/">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?mode=admin&action=category-list">Danh mục</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?mode=admin&action=product-list">Sản phẩm</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?mode=admin&action=user-list">Tài khoản</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?mode=admin&action=order-list">Đơn hàng</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <?php if (!empty($_SESSION['admin'])) : ?>
                        <li class="nav-item">
                            <span class="navbar-text text-white me-3">
                                Xin chào <?= $_SESSION['admin']['user_name'] ?>
                            </span>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?mode=admin&action=logout">Đăng xuất</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?mode=admin&action=login">Đăng nhập</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="mb-3"><?= $title ?? 'Admin' ?></h3>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_ADMIN . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>