<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['amenities'] = $_POST['selected_amenities'];

    // التوجه للصفحة التي طلبتها (من سيتواجد؟)
    header("Location: upload-photos.php");
    exit();
}
?>