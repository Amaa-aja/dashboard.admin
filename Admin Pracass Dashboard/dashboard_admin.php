<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
include 'views/dashboard_admin_view.php';