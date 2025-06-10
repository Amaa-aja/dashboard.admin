<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Pracass</title>
  <link rel="stylesheet" href="assets/css/background.css">
</head>
<body>
  <div class="login-box">
    <h2>LOGIN ADMIN PRACASS</h2>
    <?php if (!empty($error)): ?>
    <div class="error"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>