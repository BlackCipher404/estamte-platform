<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // نحفظ فقط العنوان والرابط لأن المدينة "City" موجودة أصلاً في الذاكرة من الخطوة السابقة
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['map_link'] = $_POST['map_link'];

    // التوجه للخطوة الأخيرة
    header("Location: house-rules.php");
    exit();
}
?>
