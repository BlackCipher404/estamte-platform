<?php 
// نبدأ الجلسة إذا لم تكن قد بدأت بالفعل
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db_connect.php';
include 'header-index.php'; 
// عشان ما نكرر كود الاتصال في كل صفحة، نكتبه مرة واحدة ونستدعيه

// 1. مصفوفة المحافظات (تم تنقيح الأوصاف لتكون أكثر جاذبية)
$cities_list = [
    ['name' => 'صنعاء', 'id' => 'sanaa', 'desc' => 'عبق التاريخ وتراث الأجداد'],
    ['name' => 'عدن', 'id' => 'aden', 'desc' => 'ثغر اليمن الباسم وسحر الشواطئ'],
    ['name' => 'إب', 'id' => 'ibb', 'desc' => 'اللواء الأخضر وجنة الطبيعة الساحرة'],
    ['name' => 'تعز', 'id' => 'taiz', 'desc' => 'الحالمة ومنارة الثقافة والفن'],
    ['name' => 'حضرموت', 'id' => 'hadramout', 'desc' => 'أرض الحضارات وناطحات السحاب الطينية'],
    ['name' => 'الحديدة', 'id' => 'hodeidah', 'desc' => 'عروس البحر الأحمر وجمال الساحل'],
    ['name' => 'ذمار', 'id' => 'dhamar', 'desc' => 'مدينة الملوك ومنبع العلماء'],
    ['name' => 'مأرب', 'id' => 'marib', 'desc' => 'مملكة سبأ ومعجزة السد العظيم'],
    ['name' => 'شبوة', 'id' => 'shabwah', 'desc' => 'ملتقى الصحراء والبحر والتاريخ'],
    ['name' => 'المهرة', 'id' => 'almahrah', 'desc' => 'بوابة الشرق وجوهرة المحيط'],
    ['name' => 'سقطرى', 'id' => 'socotra', 'desc' => 'جزيرة الأحلام والأساطير العالمية'],
    ['name' => 'عمران', 'id' => 'amran', 'desc' => 'حصون التاريخ وفن العمارة الحجرية'],
    ['name' => 'صعدة', 'id' => 'saada', 'desc' => 'أصالة القلاع وخيرات الأرض'],
    ['name' => 'حجة', 'id' => 'hajjah', 'desc' => 'حيث تعانق القلاع السحاب'],
    ['name' => 'البيضاء', 'id' => 'albayda', 'desc' => 'حصن اليمن وقلبها النابض'],
    ['name' => 'لحج', 'id' => 'lahj', 'desc' => 'بساتين الحسيني وعبق الفل'],
    ['name' => 'الضالع', 'id' => 'dhale', 'desc' => 'شموخ الجبال وعراقة المكان'],
    ['name' => 'المحويت', 'id' => 'mahwit', 'desc' => 'المدينة المعلقة بين الغيم والجبل'],
    ['name' => 'الجوف', 'id' => 'jawf', 'desc' => 'كنوز الآثار ومملكة معين'],
    ['name' => 'ريمة', 'id' => 'raymah', 'desc' => 'درة الجبال ومدرجات خضراء'],
    ['name' => 'أبين', 'id' => 'abyan', 'desc' => 'سلة الغذاء وجمال الدلتا']
];


// 1. كود الترتيب الذكي (يجعل مدينتك المختارة في المقدمة)
if (isset($_SESSION['city']) && !empty($_SESSION['city'])) {
    $selected_city_name = $_SESSION['city'];
    usort($cities_list, function($a, $b) use ($selected_city_name) {
        if ($a['name'] == $selected_city_name) return -1; 
        if ($b['name'] == $selected_city_name) return 1;
        return 0; 
    });
}


// 2. دالة عرض الشاليهات بالتصميم الفخم الجديد
function displayCityProperties($conn, $cityName) {
    $query = "SELECT * FROM properties WHERE city = '$cityName' ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
        // خزنا كود تنفيذ الامر داخل متغير
        // تنفيذ الأمر

    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card property-card h-100 shadow-sm rounded-4 border-0">
                    <div class="property-img-wrapper position-relative" style="height: 250px; overflow: hidden; border-radius: 15px 15px 0 0;">
                        <img class="w-100 h-100" src="img/<?php echo $row['main_image']; ?>" style="object-fit: cover; transition: transform 0.5s;" alt="<?php echo $row['title']; ?>">
                        
                        <div class="position-absolute bottom-0 start-0 m-3 z-index-1">
                            4
                    
                            <span class="price-badge bg-white shadow-sm fw-bold px-3 py-2 rounded-3 text-pink">
                                <?php echo number_format($row['price']); ?> <small class="text-muted" style="font-size: 0.7em;">ريال / ليلة</small>
                            </span>
                        </div>
                    </div>


                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title fw-bold mb-0 text-dark"><?php echo $row['title']; ?></h5>
                            <div class="small text-warning">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                        </div>


                        <p class="text-muted small mb-3">
                            <?php echo mb_substr($row['description'], 0, 85) . '...'; ?>
                        </p>


                        <hr class="my-3 opacity-25">


                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fa fa-users text-pink me-2"></i>
                                <span><?php echo $row['max_capacity']; ?> ضيوف</span>
                            </div>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fa fa-map-marker-alt text-pink me-2"></i>
                                <span><?php echo $row['city']; ?></span>
                            </div>
                        </div>


                        <div class="d-grid gap-2 d-flex">
                            <a href="property-details.php?id=<?php echo $row['id']; ?>" class="btn btn-light rounded-pill flex-grow-1 fw-bold border-0 shadow-sm">التفاصيل</a>
                            <a href="book.php?id=<?php echo $row['id']; ?>" class="btn btn-pink text-white rounded-pill flex-grow-1 shadow-sm fw-bold">احجز الآن</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '
        <div class="col-12 text-center py-5">
            <div class="bg-light rounded-4 p-5 border border-dashed">
                <i class="fa fa-home fa-3x text-muted mb-3 opacity-50"></i>
                <h5 class="text-muted">لا توجد شاليهات متاحة حالياً في '.$cityName.'</h5>
            </div>
        </div>';
    }
}
?>
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100 vh-100" src="img/carousel-1.jpg" alt="Image" style="object-fit: cover; filter: brightness(0.7);">
                

                        <div class="position-absolute top-0 end-0 p-3 p-md-4" style="z-index: 1050;">
                            <a href="#" class="btn btn-pink rounded-pill px-3 px-md-4 shadow btn-sm btn-md-lg" data-bs-toggle="modal" data-bs-target="#loginChoiceModal">
                                <i class="fa fa-user me-1 me-md-2"></i>
                                <span class="d-none d-sm-inline">تسجيل الدخول</span>
                                <span class="d-inline d-sm-none">دخول</span>
                            </a>
                        </div>
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown border-white">حياة الرفاهية</h6>
                        <h1 class="display-3 text-white mb-5 animated slideInDown">اكتشف أرقى الشاليهات والمزارع</h1>
                        <div class="d-inline-block animated fadeInUp">
                            <div class="dropdown">
                                <button class="btn btn-light py-3 px-5 rounded-pill shadow-lg fw-bold dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.2rem; min-width: 250px;">
                                    <i class="fa fa-map-location-dot text-pink me-2"></i> اختر وجهتك
                                </button>
                                <ul class="dropdown-menu text-end shadow-lg mt-3 p-2 border-0 rounded-4" style="max-height: 300px; overflow-y: auto; width: 100%;">
                                    <li class="px-3 py-2 text-muted small fw-bold border-bottom mb-2">جميع المحافظات</li>
                                    <?php 
                                    $dropdown_cities = $cities_list;
                                    // sort($dropdown_cities); // يمكنك تفعيل هذا السطر لترتيب القائمة أبجدياً
                                    foreach ($dropdown_cities as $city): ?>
                                        <li>
                                            <a class="dropdown-item py-2 rounded-3 mb-1 d-flex justify-content-between align-items-center" href="#<?php echo $city['id']; ?>-section">
                                                <span><?php echo $city['name']; ?></span>
                                                <i class="fa fa-chevron-left text-muted small" style="font-size: 0.7rem;"></i>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ********************* -->


        <div class="container-xxl py-5" dir="rtl">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 text-end">
                        <h6 class="section-title text-start text-pink text-uppercase">مميزاتنا</h6>
                        <h1 class="mb-4">لماذا تحجز عبر <span class="text-pink text-uppercase">منصتنا؟</span></h1>
                        <p class="mb-4">نحن نوفر لك تجربة حجز سهلة وآمنة، مع ضمان الوصول لأفضل المزارع والشاليهات في مختلف محافظات الجمهورية اليمنية بأسعار تنافسية وخصوصية تامة.</p>




                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1 shadow-sm">
                                    <div class="border rounded text-center p-3 bg-light">
                                        <i class="fa fa-shield-alt fa-2x text-pink mb-2"></i>
                                        <h5 class="mb-1">خصوصية تامة</h5>
                                        <p class="small mb-0">للعائلات</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1 shadow-sm">
                                    <div class="border rounded text-center p-3 bg-light">
                                        <i class="fa fa-check-circle fa-2x text-pink mb-2"></i>
                                        <h5 class="mb-1">تأكيد فوري</h5>
                                        <p class="small mb-0">للحجز</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1 shadow-sm">
                                    <div class="border rounded text-center p-3 bg-light">
                                        <i class="fa fa-headset fa-2x text-pink mb-2"></i>
                                        <h5 class="mb-1">دعم 24/7</h5>
                                        <p class="small mb-0">خدمة عملاء</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4"><i class="fa fa-check text-pink me-2"></i> أكثر من 150 موقع مصنف وموثوق.</p>
                        <p class="mb-4"><i class="fa fa-check text-pink me-2"></i> صور حقيقية وتحديثات مستمرة للأسعار.</p>
                    </div>




                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/صوره مسبح.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/مسبح شاليه عدن.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







<?php 
foreach ($cities_list as $city): 
?>

<div id="<?php echo $city['id']; ?>-section" class="container-xxl py-5" dir="rtl">
    <div class="container">
        
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-pink text-uppercase px-3">وجهات <?php echo $city['name']; ?></h6>
            <h1 class="mb-5">استمتع بـ <span class="text-pink"><?php echo $city['desc']; ?></span></h1>
        </div>

        <div class="row g-4">
            <?php displayCityProperties($conn, $city['name']); ?>
        </div>

    </div>
</div>

<div class="container">
    <hr class="my-5" style="opacity: 0.1; border-top: 2px dashed #FF385C;">
</div>

<?php 
endforeach; 
?>

<?php include 'footer-index.php'; ?>