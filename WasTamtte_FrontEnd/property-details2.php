<?php
// 1. الاتصال بقاعدة البيانات
include 'db_connect.php';
include 'header-index.php'; 

?>

<?php
/**
 * دالة لجلب عدد العقارات بناءً على المدينة والنوع
 */
function getCount($conn, $city, $type) {
    // تم التعديل لتجنب الأخطاء، استخدام استعلام مباشر وآمن
    $city = mysqli_real_escape_string($conn, $city);
    $type = mysqli_real_escape_string($conn, $type);
    
    $sql = "SELECT COUNT(*) as total FROM properties WHERE city = '$city' AND type = '$type'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    return 0;
}

/**
 * دالة لعرض سلايدر (Slider) لمدينة معينة
 */
function displayCitySlider($conn, $city, $title) {
    // تأمين المدخلات
    $citySafe = mysqli_real_escape_string($conn, $city);
    // جلب البيانات بالترتيب الأحدث
    $sql = "SELECT * FROM properties WHERE city = '$citySafe' ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    
    // إنشاء معرف فريد للسلايدر
    $containerId = "scroll-" . md5($city);

    echo '<div class="container-xxl py-5" dir="rtl">';
    echo '    <div class="container">';
    
    // عنوان القسم وأزرار التحكم
    echo '        <div class="d-flex justify-content-between align-items-center mb-4">';
    echo '            <h2 class="fw-bold m-0 text-dark">' . $title . '</h2>';
    echo '            <a href="category.php?city='.$city.'" class="btn btn-outline-dark rounded-pill btn-sm px-3">عرض الكل <i class="fa fa-arrow-left ms-1"></i></a>';
    echo '        </div>';

    // بداية السلايدر
    echo '        <div class="horizontal-scroll-wrapper" id="' . $containerId . '">';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // تنسيق السعر
            $price = number_format($row['price']);
            // التأكد من الصورة (إذا كانت فارغة نضع صورة افتراضية)
            $imagePath = !empty($row['main_image']) ? 'img/' . $row['main_image'] : 'img/default.jpg';
            
            // تحويل المميزات لمصفوفة لعرض أول ميزة فقط
            $amenities = explode(',', $row['amenities']);
            $firstAmenity = isset($amenities[0]) ? $amenities[0] : 'خدمات مميزة';

            echo '
            <div class="scroll-item">
                <div class="card property-card shadow-sm h-100">
                    <div class="position-relative">
                        <img src="' . $imagePath . '" class="card-img-top" alt="' . $row['title'] . '" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-white text-pink shadow-sm px-2 py-1 rounded-pill fw-bold">
                                ' . $row['type'] . '
                            </span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-2">
                            <span class="badge bg-pink shadow-sm px-3 py-2 rounded-3">
                                ' . $price . ' ريال / ليلة
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-body p-3">
                        <h5 class="card-title fw-bold text-truncate text-dark mb-1">' . $row['title'] . '</h5>
                        <p class="text-muted small mb-2"><i class="fa fa-map-marker-alt text-pink me-1"></i> ' . $row['address'] . '</p>
                        
                        <div class="d-flex justify-content-between align-items-center bg-light rounded p-2 mb-3 small text-muted">
                            <span><i class="fa fa-users text-pink me-1"></i> ' . $row['max_capacity'] . ' ضيوف</span>
                            <span><i class="fa fa-star text-warning"></i> 5.0</span>
                        </div>
                        
                        <p class="card-text text-muted small text-truncate" style="max-width: 100%;">' . $row['description'] . '</p>
                        
                        <div class="d-grid gap-2">
                            <a href="property-details.php?id=' . $row['id'] . '" class="btn btn-outline-dark btn-sm rounded-pill fw-bold">التفاصيل</a>
                            <a href="booking.php?id=' . $row['id'] . '" class="btn btn-pink btn-sm rounded-pill fw-bold">احجز الآن</a>
                        </div>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo '
        <div class="col-12 text-center py-5 w-100 bg-light rounded-3">
            <i class="fa fa-home fa-3x text-muted mb-3 opacity-25"></i>
            <h5 class="text-muted">قريباً في ' . $city . '...</h5>
            <p class="text-muted small">لا توجد عقارات مضافة حالياً</p>
        </div>';
    }

    echo '        </div>'; // إغلاق wrapper
    echo '    </div>'; // إغلاق container
    echo '</div>'; // إغلاق section
}
?>

<div class="container-xxl py-5">
    <div class="container" dir="rtl">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-pink text-uppercase px-3">وجهاتنا</h6>
            <h1 class="mb-5">اختر وجهتك <span class="text-pink">المفضلة</span></h1>
        </div>
        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="service-item rounded text-center p-4 d-block text-decoration-none shadow bg-white border-0 position-relative overflow-hidden h-100 property-card" href="#sanaa-section">
                    <div class="service-icon bg-pink text-white rounded-circle mb-4 mx-auto d-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px;">
                        <i class="fa fa-city fa-2x"></i>
                    </div>
                    <h4 class="mb-3 text-dark fw-bold">صنعاء</h4>
                    <p class="text-muted mb-0">
                        <span class="badge bg-light text-dark border"><?php echo getCount($conn, 'صنعاء', 'شاليه'); ?> شاليه</span>
                        <span class="badge bg-light text-dark border"><?php echo getCount($conn, 'صنعاء', 'مزرعة'); ?> مزرعة</span>
                    </p>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="service-item rounded text-center p-4 d-block text-decoration-none shadow bg-white border-0 position-relative overflow-hidden h-100 property-card" href="#ibb-section">
                    <div class="service-icon bg-success text-white rounded-circle mb-4 mx-auto d-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px;">
                        <i class="fa fa-tree fa-2x"></i>
                    </div>
                    <h4 class="mb-3 text-dark fw-bold">إب الخضراء</h4>
                    <p class="text-muted mb-0">
                        <span class="badge bg-light text-dark border"><?php echo getCount($conn, 'إب', 'شاليه'); ?> شاليه</span>
                        <span class="badge bg-light text-dark border"><?php echo getCount($conn, 'إب', 'مزرعة'); ?> مزرعة</span>
                    </p>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <a class="service-item rounded text-center p-4 d-block text-decoration-none shadow bg-white border-0 position-relative overflow-hidden h-100 property-card" href="#aden-section">
                    <div class="service-icon bg-info text-white rounded-circle mb-4 mx-auto d-flex align-items-center justify-content-center shadow" style="width: 80px; height: 80px;">
                        <i class="fa fa-umbrella-beach fa-2x"></i>
                    </div>
                    <h4 class="mb-3 text-dark fw-bold">عدن</h4>
                    <p class="text-muted mb-0">
                        <span class="badge bg-light text-dark border"><?php echo getCount($conn, 'عدن', 'شاليه'); ?> شاليه</span>
                        <span class="badge bg-light text-dark border"><?php echo getCount($conn, 'عدن', 'مزرعة'); ?> مزرعة</span>
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="sanaa-section">
    <?php displayCitySlider($conn, 'صنعاء', '✨ أفخم شاليهات ومزارع صنعاء'); ?>
</div>
<div id="ibb-section">
    <?php displayCitySlider($conn, 'إب', '🌿 جنة الله في أرضه - إب'); ?>
</div>
<div id="aden-section">
    <?php displayCitySlider($conn, 'عدن', '🌊 سحر البحر - عدن'); ?>
</div>

<?php 
include 'footer-index.php'; 
?>