<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Email dan Password tidak boleh kosong.";
    } else {
        $stmt = $conn->prepare("SELECT email, password, role FROM dataview WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($fetchedEmail, $hashedPassword, $role);
        if ($stmt->fetch()) {
            if (password_verify($password, $hashedPassword)) {
                if ($role === "admin") {
                    $_SESSION['email'] = $fetchedEmail;
                    $_SESSION['role'] = $role;
                    header("Location: dashboard_admin.php");
                    exit();
                } else {
                    $error = "Akses hanya untuk admin.";
                }
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Email tidak ditemukan.";
        }
        $stmt->close();
    }
}
include 'views/login_view.php';