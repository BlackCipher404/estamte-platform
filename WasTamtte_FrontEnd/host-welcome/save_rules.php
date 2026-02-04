<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // حفظ نوع الضيوف (مصفوفة نحولها لنص)
    $_SESSION['guests_allowed'] = isset($_POST['guests_type']) ? implode(", ", $_POST['guests_type']) : "غير محدد";
    
    // حفظ الأعداد
    $_SESSION['normal_capacity'] = $_POST['normal_capacity'];
    $_SESSION['max_capacity'] = $_POST['max_capacity'];
    
    // حفظ القواعد (نعم/لا)
    $_SESSION['allow_pets'] = isset($_POST['allow_pets']) ? "نعم" : "لا";
    $_SESSION['allow_smoking'] = isset($_POST['allow_smoking']) ? "نعم" : "لا";

    // التوجه للخطوة الأخيرة (الصور والأسعار)
    header("Location: who-is-there.php");
    exit();
}