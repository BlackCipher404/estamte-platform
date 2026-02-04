<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // منطق الرفع: في المشروع الحقيقي نستخدم move_uploaded_file
    // هنا سنخزن عددهم فقط للمتابعة
    if(isset($_FILES['property_images'])) {
        $_SESSION['photos_count'] = count($_FILES['property_images']['name']);
        // سنفترض نجاح الرفع
        header("Location: pricing-step.php");
        exit();
    }
}
?>