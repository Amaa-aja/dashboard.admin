<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pracass";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, email, role FROM dataview");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="dashboard">
    <header>
        <h1>DASHBOARD ADMIN PRACASS</h1>
        <div class="admin-bar">
            <span>Login sebagai: Mas Admin <?= ($email) ?></span>
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </header>

    <main>
        <h2>Data Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td>
                        <form method="POST" action="update_role.php">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <select name="role" onchange="this.form.submit()">
                                <option value="user" <?= $row['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="delete.php" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="delete-btn">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</div>
</body>
</html>
