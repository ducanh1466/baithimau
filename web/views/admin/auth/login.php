<?php extract($data ?? []); ?>

<div class="login-wrapper">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <div class="login-box">

        <h2>⚙ Admin Login</h2>

        <?php if (!empty($error)) : ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form action="?mode=admin&action=login-handle" method="POST">

            <!-- USER -->
            <div class="input-group">
            <i class="fa fa-user icon"></i>
            <input type="text" name="user_name" required>
            <label>Tên đăng nhập</label>
        </div>

        <div class="input-group">
            <i class="fa fa-lock icon"></i>
            <input type="password" name="pass_word" id="password" required>
            <label>Mật khẩu</label>
            <span class="toggle" onclick="togglePassword()">
                <i class="fa fa-eye"></i>
            </span>
        </div>

            <button type="submit">Đăng nhập</button>

        </form>

    </div>

</div>

</div>
<style>
    body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
}

/* BACKGROUND */
.login-wrapper {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #eef2ff; /* nền nhẹ, sang */
}

/* BOX */
.login-box {
    width: 360px;
    padding: 35px;
    border-radius: 16px;
    background: white;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    text-align: center;
}

.login-box h2 {
    margin-bottom: 25px;
    color: #1e293b;
}

/* INPUT */
.input-group {
    position: relative;
    margin-bottom: 20px;
}

.input-group input {
    width: 100%;
    padding: 14px 45px;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
    font-size: 14px;
    transition: 0.3s;
}

.input-group input:focus {
    border-color: #6366f1;
    background: white;
    box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
}

/* LABEL FIX */
.input-group label {
    position: absolute;
    left: 45px;
    top: -8px;
    background: white;
    padding: 0 6px;
    font-size: 12px;
    color: #6b7280;
}

/* ICON */
.icon {
    position: absolute;
    left: 15px;
    top: 14px;
    color: #9ca3af;
}

/* TOGGLE */
.toggle {
    position: absolute;
    right: 15px;
    top: 14px;
    cursor: pointer;
    color: #9ca3af;
}

/* BUTTON */
button {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg,#6366f1,#4f46e5);
    color: white;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 20px rgba(99,102,241,0.3);
}

/* ERROR */
.error {
    background: #fee2e2;
    color: #dc2626;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}
</style>
<script>
function togglePassword() {
    const pass = document.getElementById("password");

    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}
</script>