<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'db.php'; 

$id = $_POST['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM dataview WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: dashboard_admin.php");
    } else {
        echo "Gagal menghapus user.";
    }
    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
