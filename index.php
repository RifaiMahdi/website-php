<?php
session_start();

/* =========================
   DATA USER
========================= */
$valid_username = "admin";
$valid_password = "12345";

/* =========================
   PROSES LOGIN
========================= */
if (isset($_POST['login'])) {
    if ($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {
        $_SESSION['username'] = $valid_username;
    } else {
        $error = "Username atau password salah!";
    }
}

/* =========================
   LOGOUT
========================= */
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Simple</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        }

        .box {
            width: 320px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
        }

        .logo {
            width: 200px;
            margin-bottom: 15px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            border: none;
            color: white;
        }

        .error {
            color: red;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="box">

    <!-- LOGO -->
    <img src="download.jfif" class="logo" alt="Logo Sekolah">

<?php if (isset($_SESSION['username'])): ?>

    <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Login berhasil 🎉</p>
    <a href="?logout=1">Logout</a>

<?php else: ?>

    <h2>Login</h2>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Masuk</button>
    </form>

<?php endif; ?>

</div>

</body>
</html>
