<?php
session_start();

if (isset($_GET['type'])) {
    $_SESSION['property_type'] = $_GET['type']; // هنا يتم الحفظ الفعلي في الذاكرة
    
    // التوجه للصفحة التالية التي ستطلب بقية البيانات
    header("Location: add-property-details.php");
    exit();
} else {
    header("Location: select-type.php");
    exit();
}