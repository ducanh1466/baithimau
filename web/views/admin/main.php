<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title><?= $title ?? 'Admin' ?></title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    display: flex;
    background: #f1f5f9;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    height: 100vh;
    background: #0f172a;
    color: white;
    position: fixed;
}

.sidebar h2 {
    text-align: center;
    padding: 20px;
    border-bottom: 1px solid #1e293b;
}

.sidebar a {
    display: block;
    padding: 14px 20px;
    color: #cbd5e1;
    text-decoration: none;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #1e293b;
    color: white;
}

/* MAIN */
.main {
    margin-left: 250px;
    width: 100%;
    padding: 20px;
}

/* TOPBAR */
.topbar {
    display: flex;
    justify-content: space-between;
    background: white;
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* CARD */
.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* GRID */
.grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

/* STAT BOX */
.stat {
    padding: 20px;
    border-radius: 10px;
    color: white;
}

.stat h3 {
    font-size: 22px;
}

.stat p {
    font-size: 14px;
    opacity: 0.8;
}

.blue { background: #3b82f6; }
.green { background: #10b981; }
.orange { background: #f59e0b; }
.red { background: #ef4444; }

canvas {
    width: 100% !important;
    height: 300px !important;
}
.card {
    background: rgba(255,255,255,0.9);
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    margin-bottom: 20px;
}

.card h3 {
    margin-bottom: 15px;
    font-size: 18px;
}

canvas {
    max-height: 320px;
}
.blue { background: linear-gradient(135deg,#6366f1,#818cf8); }
.green { background: linear-gradient(135deg,#10b981,#34d399); }
.orange { background: linear-gradient(135deg,#f59e0b,#fbbf24); }
.red { background: linear-gradient(135deg,#ef4444,#f87171); }
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>⚙ ADMIN</h2>

    <a href="?mode=admin&action=/">🏠 Dashboard</a>
    <a href="?mode=admin&action=category-list">📁 Danh mục</a>
    <a href="?mode=admin&action=product-list">🛒 Sản phẩm</a>
    <a href="?mode=admin&action=user-list">👤 Tài khoản</a>
    <a href="?mode=admin&action=order-list">📦 Đơn hàng</a>

    <a href="?mode=admin&action=logout">🚪 Đăng xuất</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOP -->
    <div class="topbar">
        <h3><?= $title ?? '' ?></h3>
        <div>Xin chào <?= $_SESSION['admin']['user_name'] ?? '' ?> 👋</div>
    </div>

    <!-- CONTENT -->
    <?php require_once PATH_VIEW_ADMIN . $view . '.php'; ?>

</div>

</body>
</html>