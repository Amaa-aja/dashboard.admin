<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? null;
    $role = $_POST['role'] ?? '';

    if ($id && $role) {
        $stmt = $conn->prepare("UPDATE dataview SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $role, $id);
        if ($stmt->execute()) {
            header("Location: dashboard_admin.php");
            exit();
        } else {
            echo "Gagal memperbarui role.";
        }
        $stmt->close();
    } else {
        echo "ID atau role tidak valid.";
    }
}
?>