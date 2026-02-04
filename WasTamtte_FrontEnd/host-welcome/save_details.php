<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. استقبال البيانات
    $full = isset($_POST['booking_type_full']) ? 1 : 0;
    $partial = isset($_POST['booking_type_partial']) ? 1 : 0;
    $segments = isset($_POST['segments_count']) ? (int)$_POST['segments_count'] : 0;

    // 2. الحفظ في الذاكرة
    $_SESSION['is_full'] = $full;
    $_SESSION['is_partial'] = $partial;
    $_SESSION['segments'] = $segments;

    // 3. التوجه لصفحة المحافظات والموقع
    header("Location: select-city.php");
    exit();
} 
?>