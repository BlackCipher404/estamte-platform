<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // حفظ المتواجدين (تحويل المصفوفة لنص)
    $_SESSION['who_is_there'] = isset($_POST['presence']) ? implode(", ", $_POST['presence']) : "لا يوجد أحد (خصوصية كاملة)";
    
    // حفظ المرافق القريبة
    $_SESSION['nearby_places'] = $_POST['nearby_places'];

    // الآن نتوجه لآخر محطة: الأسعار والصور
    header("Location: amenities-step.php");
    exit();
}
?>