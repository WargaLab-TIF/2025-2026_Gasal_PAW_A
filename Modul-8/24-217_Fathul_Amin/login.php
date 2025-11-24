<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-card">
    <h2>Login</h2>
    <br>
    <?php if (isset($_GET['error'])): ?>
    <div class="alert"><?= htmlspecialchars($_GET['error']); ?></div>
<?php endif; ?>

    <form action="action_login.php" method="POST">
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>

        <input type="password" id="password" name="password" placeholder="Masukkan password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>