<?php
session_start();

// 1. الاتصال بقاعدة البيانات (عدلي البيانات حسب جهازك)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yemen_booking"; // اسم قاعدة بياناتك

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بالقاعدة: " . $conn->connect_error);
}

// 2. التحقق من أن المستخدم جاء من زر "نشر"
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // === تجميع البيانات من الصفحة الحالية (السعر والاسم) ===
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $is_negotiable = isset($_POST['negotiable']) ? 1 : 0;

    // === تجميع البيانات من الذاكرة (SESSION) من الصفحات السابقة ===
    $prop_type = $_SESSION['property_type'];         // شاليه أو مزرعة
    $booking_full = $_SESSION['is_full'];            // حجز كامل
    $booking_partial = $_SESSION['is_partial'];      // حجز جزئي
    $city = $_SESSION['city'];                       // المحافظة
    $address = $_SESSION['address'];                 // العنوان
    $map_link = $_SESSION['map_link'];               // رابط قوقل
    $amenities = $_SESSION['amenities'];             // المرافق (مسبح، نت...)
    $guests_rules = $_SESSION['guests_allowed'];     // عوائل/شباب
    $max_capacity = $_SESSION['max_capacity'];       // عدد الأشخاص
    $who_is_there = $_SESSION['who_is_there'];       // من المتواجد
    
    // ملاحظة: الصور نحتاج منطق خاص لرفعها، هنا سنضع مسار افتراضي للتجربة
    // في المشروع الحقيقي نستخدم الحلقات لرفع الملفات
    $main_image = "uploads/default_chalet.jpg"; 

    // 3. كتابة استعلام الحفظ (SQL INSERT)
    // لاحظي: نستخدم prepared statements للأمان
    $sql = "INSERT INTO properties (
                title, description, price, type, 
                city, address, map_link, 
                is_full, is_partial, max_capacity, 
                amenities, guests_rules, who_is_there, 
                main_image, created_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    
    // ربط البيانات
    $stmt->bind_param("ssissssiisssss", 
        $title, $description, $price, $prop_type, 
        $city, $address, $map_link, 
        $booking_full, $booking_partial, $max_capacity, 
        $amenities, $guests_rules, $who_is_there, 
        $main_image
    );

    // 4. تنفيذ الحفظ
    if ($stmt->execute()) {
        // نجاح الحفظ!
        
        // تنظيف الذاكرة (عشان لو حب يضيف عقار ثاني يبدأ من جديد)
        session_unset();
        session_destroy();

        // التوجه لصفحة النجاح أو الصفحة الرئيسية
        echo "<script>
                alert('تم نشر عقارك بنجاح! مبروك 🎉');
                window.location.href = 'index.php'; // العودة للرئيسية
              </script>";
    } else {
        echo "حدث خطأ أثناء الحفظ: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>