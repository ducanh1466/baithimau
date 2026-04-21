<?php
$user = $_SESSION['user'] ?? null;
$cartCount = count($_SESSION['cart'] ?? []);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Football Shop' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f5f5f5; }

        /* NAVBAR */
        .navbar { box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .navbar-brand { font-weight: bold; font-size: 22px; }

        /* PRODUCT */
        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.3s;
            background: white;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .product-card img {
            height: 220px;
            object-fit: cover;
        }

        .price {
            color: red;
            font-weight: bold;
            font-size: 18px;
        }

        /* BADGE */
        .badge-cart {
            font-size: 10px;
        }

        /* BANNER */
        .banner {
            height: 300px;
            border-radius: 12px;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        footer a:hover {
        color: #0d6efd !important;
        transform: scale(1.2);
        }
        #search-result a:hover {
        background: #f8f9fa;
        }
        body {
    background: #f5f5f5;
    font-family: 'Segoe UI', sans-serif;
}

/* TITLE */
.section-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
}

/* PRODUCT CARD */
.product-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s;
    border: 1px solid #eee;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.product-card img {
    height: 200px;
    object-fit: cover;
    width: 100%;
}

/* NAME */
.product-name {
    font-size: 14px;
    height: 40px;
    overflow: hidden;
}

/* PRICE */
.product-price {
    color: #e60023;
    font-weight: bold;
    font-size: 16px;
}

/* BUTTON */
.btn-buy {
    background: #e60023;
    color: #fff;
    border-radius: 8px;
    font-size: 13px;
}

.btn-buy:hover {
    background: #c4001d;
}

/* BADGE */
.badge-hot {
    position: absolute;
    top: 10px;
    left: 10px;
    background: red;
    color: #fff;
    font-size: 11px;
    padding: 3px 6px;
    border-radius: 5px;
}
.container {
    max-width: 1200px;
    margin: auto;
}
.product-card img {
    transition: 0.3s;
}

.product-card:hover img {
    transform: scale(1.05);
}
/* ===== FIX SLIDER BANNER ===== */
.carousel {
    max-height: 420px;
    overflow: hidden;
    border-radius: 12px;
}

.carousel-item img {
    width: 100%;
    height: 420px !important;
    object-fit: cover;
}

/* ===== RESPONSIVE (cho đẹp mọi màn hình) ===== */
@media (max-width: 768px) {
    .carousel-item img {
        height: 250px !important;
    }
}

/* ===== OPTIONAL: làm banner xịn hơn ===== */
.carousel-item::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.2);
}
.product-card img {
        width: 100%;
        height: 220px;
        object-fit: contain;
        background: #f8f8f8;
        padding: 10px;
        transition: 0.3s;
    }

    .product-card:hover img {
        transform: scale(1.05);
    }

    /* ===== CARD ===== */
    .product-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #eee;
        transition: 0.3s;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    /* ===== TEXT ===== */
    .product-name {
        font-size: 14px;
        height: 40px;
        overflow: hidden;
    }

    .product-price {
        color: #e60023;
        font-weight: bold;
    }

    /* ===== BUTTON ===== */
    .btn-detail {
        background: #0d6efd;
        color: #fff;
        border-radius: 6px;
        font-size: 13px;
    }

    .btn-cart {
        background: #28a745;
        color: #fff;
        border-radius: 6px;
        font-size: 13px;
    }

    /* ===== FIX LAYOUT ===== */
    .row {
        margin-left: 0;
        margin-right: 0;
    }

    /* ===== BADGE HOT ===== */
    .badge-hot {
        position: absolute;
        top: 10px;
        left: 10px;
        background: red;
        color: #fff;
        font-size: 11px;
        padding: 4px 6px;
        border-radius: 5px;
    }
        #main-img {
        height: 400px;
        object-fit: contain;
    }

    .thumb {
        cursor: pointer;
        transition: 0.3s;
    }

    .thumb:hover {
        border: 2px solid red;
    }
    .size-btn.active {
    background: black;
    color: white;
    }
        .table th {
        width: 30%;
        background: #f8f8f8;
    }
        .thumb {
        cursor: pointer;
        border: 1px solid #ddd;
        padding: 3px;
    }

    .thumb:hover {
        border: 2px solid red;
    }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid px-4">

        <a class="navbar-brand" href="<?= BASE_URL ?>">⚽ VNBALL</a>

        <div class="collapse navbar-collapse">

            <ul class="navbar-nav me-auto">

    <li class="nav-item">
        <a class="nav-link" href="?mode=client&action=home-page">Trang chủ</a>
    </li>

    <li class="nav-item">
        <a href="?mode=client&action=about" class="nav-link">Giới thiệu</a>
    </li>

    <!-- SẢN PHẨM  -->
    <li class="nav-item dropdown">
        <a class="nav-link" href="?mode=client&action=product-list" >Sản phẩm</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">Tin tức</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">Hỗ trợ</a>
    </li>

</ul>
        <!-- seach  -->
         <div class="position-relative me-3 d-flex" style="width:350px;">

    <input type="text"
           id="search-input"
           class="form-control"
           placeholder="Tìm sản phẩm...">

    <a href="#" id="search-btn" class="btn btn-danger ms-1">
        <i class="bi bi-search"></i>
    </a>

    <div id="search-result"
         class="bg-white border position-absolute w-100 mt-1"
         style="z-index:999; display:none; top:100%;">
    </div>

</div>
            <ul class="navbar-nav align-items-center">

                <!-- CART -->
                <li class="nav-item me-3">
                    <a href="?mode=client&action=cart" class="text-white position-relative">
                        <i class="bi bi-cart fs-4"></i>

                        <?php if ($cartCount > 0): ?>
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle badge-cart">
                                <?= $cartCount ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>

                <!-- USER -->
                <?php if ($user): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <?= $user['user_name'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?mode=client&action=logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?mode=client&action=login">Login</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
<br>

<!-- CONTENT -->
<?php if (strpos($view, 'home') !== false): ?>

<div id="banner" class="carousel slide mb-4" data-bs-ride="carousel">

    <div class="carousel-inner rounded">

        <div class="carousel-item active">
            <img src="./assets/uploads/products/banner6.webp" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="./assets/uploads/products/banner7.jpg" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="./assets/uploads/products/banner8.webp" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="./assets/uploads/products/banner9.webp" class="d-block w-100">
        </div>

        <div class="carousel-item">
            <img src="./assets/uploads/products/image.png" class="d-block w-100">
        </div>

    </div>

</div>

<h6 class="section-title text-center mt-5 ">🆕 Sản phẩm mới nhất</h6>

<div class="row">
<?php foreach ($latestProducts ?? [] as $item): ?>
    <div class="col-md-3 mb-4">

        <div class="product-card">

            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCTS . ($item['image'] ?? '') ?>">

            <div class="p-3">

                <div class="product-name">
                    <?= $item['name'] ?>
                </div>

                <div class="product-price mt-1">
                    <?= number_format($item['price']) ?>đ
                </div>

                <a href="?mode=client&action=product-detail&id=<?= $item['id'] ?>"
                   class="btn btn-buy w-100 mt-2">
                    Mua ngay
                </a>

            </div>

        </div>

    </div>
<?php endforeach; ?>
</div>
<?php endif; ?>


    <div class="row">
        <?php require_once PATH_VIEW_CLIENT . $view . '.php'; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<footer class="bg-dark text-white mt-5 pt-5 pb-3">
    <div class="container">

        <div class="row">

            <!-- CỘT 1 -->
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">VNBALL</h5>
                <p>Chuyên đồ bóng đá chính hãng.</p>

                <p class="small">
                    Giấy chứng nhận ĐKKD số: 0108755246 <br>
                    Do Sở KH&ĐT TP Hà Nội cấp
                </p>

                <img src="./assets/uploads/products/z7735857879254_328242d058ee4b802c858590ebfd510d.jpg"
                     style="width:120px;">
            </div>

            <!-- CỘT 2 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Giới thiệu</h6>
                <p>Giới thiệu về VNBALL</p>

                <h6 class="fw-bold mt-3">Hỗ trợ khách hàng</h6>
                <p>Câu hỏi thường gặp</p>
                <p>Chính sách đổi trả</p>
                <p>Chính sách bảo mật</p>
            </div>

            <!-- CỘT 3 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Dịch vụ</h6>
                <p>Quần áo đá bóng</p>
                <p>Giày đá bóng</p>
                <p>Găng tay thủ môn</p>
                <p>Phụ kiện bóng đá</p>
            </div>

            <!-- CỘT 4 -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Thông tin liên hệ</h6>

                <p class="small">
                    Tầng 11, Toà nhà Peakview, 36 Hoàng Cầu,<br>
                    Hà Nội
                </p>

                <p>Email: shop@gmail.com</p>
                <p>Hotline: 0123456789</p>

                <!-- SOCIAL -->
                <h6 class="fw-bold mt-3">Kết nối với VNBALL</h6>

                <div class="d-flex gap-3 mt-2">

                    <a href="https://facebook.com" target="_blank" class="text-white fs-4">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://instagram.com" target="_blank" class="text-white fs-4">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="https://tiktok.com" target="_blank" class="text-white fs-4">
                        <i class="bi bi-tiktok"></i>
                    </a>

                </div>

            </div>

        </div>

        <hr class="border-secondary">

        <p class="text-center mb-0 small">
            © 2026 Bản quyền của VNBALL Việt Nam
        </p>

    </div>
</footer>
    <script>
    const input = document.getElementById("search-input");
    const resultBox = document.getElementById("search-result");

    input.addEventListener("keyup", function() {
        let keyword = this.value;

        if (keyword.length < 2) {
            resultBox.style.display = "none";
            return;
        }

        fetch(`?mode=client&action=search-ajax&keyword=${keyword}`)
            .then(res => res.text())
            .then(data => {
                resultBox.innerHTML = data;
                resultBox.style.display = "block";
            });
    });
    </script>
    <script>
    document.getElementById("search-btn").onclick = function() {
        let keyword = document.getElementById("search-input").value;

        if (keyword.trim() !== "") {
            window.location.href = `?mode=client&action=search&keyword=${keyword}`;
        }
    };
    </script>
    <script>
    document.querySelectorAll('.thumb').forEach(img => {
        img.onclick = function() {
            document.getElementById('main-img').src = this.src;
        }
    });
    </script>
</body>
</html>