<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'yemen_booking';
//  اسم قاعده البيانات

$conn = mysqli_connect($host, $user, $pass, $db);

// تحديد الترميز لدعم اللغة العربية
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
// تعيين ترميز اللغة العربية لتجنب ظهور علامات استفهام



?>
<!-- خارجي عشان بيانات القاعدة  ما تكون مكشوفة في كل الصفحات -->

