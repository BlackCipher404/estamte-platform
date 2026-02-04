<?php 
session_start();
include 'header.php'; 
?>

<style>
    .city-card {
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid #eee;
    }
    .city-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .property-active { 
        border: 2.5px solid #FF385C !important; 
        background-color: #fff1f3; 
    }
    .city-icon {
        color: #6c757d;
        transition: 0.3s;
    }
    .property-active .city-icon {
        color: #FF385C;
    }
    .pink-text { color: #FF385C; }
</style>

<div class="container py-5 mt-5 text-center">
    <h2 class="fw-bold mb-2">في أي <span class="pink-text">محافظة</span> يقع مكانك؟</h2>
    <p class="text-muted mb-5">اختر المحافظة التي يتواجد فيها الشاليه أو المزرعة</p>
    
    <div class="row g-4 justify-content-center mb-5 pb-5">
        
        <?php
        // مصفوفة تحتوي على كل المحافظات اليمنية مع الأيقونات المقترحة
        $cities = [
            ['name' => 'صنعاء', 'icon' => 'fa-city'],
            ['name' => 'عدن', 'icon' => 'fa-ship'],
            ['name' => 'إب', 'icon' => 'fa-mountain-sun'],
            ['name' => 'تعز', 'icon' => 'fa-fort-awesome'],
            ['name' => 'حضرموت', 'icon' => 'fa-mosque'],
            ['name' => 'الحديدة', 'icon' => 'fa-umbrella-beach'],
            ['name' => 'ذمار', 'icon' => 'fa-horse'],
            ['name' => 'مأرب', 'icon' => 'fa-columns'],
            ['name' => 'شبوة', 'icon' => 'fa-oil-well'],
            ['name' => 'المهرة', 'icon' => 'fa-anchor'],
            ['name' => 'سقطرى', 'icon' => 'fa-tree'], // شجرة دم الأخوين
            ['name' => 'عمران', 'icon' => 'fa-archway'],
            ['name' => 'صعدة', 'icon' => 'fa-grapes'],
            ['name' => 'حجة', 'icon' => 'fa-castle'],
            ['name' => 'البيضاء', 'icon' => 'fa-chess-rook'],
            ['name' => 'لحج', 'icon' => 'fa-seedling'],
            ['name' => 'الضالع', 'icon' => 'fa-hill-rockslide'],
            ['name' => 'المحويت', 'icon' => 'fa-cloud-sun'],
            ['name' => 'الجوف', 'icon' => 'fa-sun'],
            ['name' => 'ريمة', 'icon' => 'fa-mountain'],
            ['name' => 'أبين', 'icon' => 'fa-wheat-awn']
        ];

        foreach ($cities as $city) {
            echo '
            <div class="col-lg-3 col-md-4 col-6">
                <div class="city-card p-4 rounded-4 shadow-sm h-100 bg-white" onclick="saveCity(\''.$city['name'].'\', this)">
                    <div class="city-icon mb-3">
                        <i class="fa-solid '.$city['icon'].' fa-3x"></i>
                    </div>
                    <h6 class="fw-bold">'.$city['name'].'</h6>
                </div>
            </div>';
        }
        ?>

    </div>

    <div class="fixed-bottom bg-white border-top p-3 shadow-lg" style="z-index: 1050;">
        <div class="container d-flex justify-content-between align-items-center">
            <button class="btn btn-link text-dark fw-bold text-decoration-none" onclick="history.back()">
                <i class="fa-solid fa-chevron-right me-2"></i> رجوع
            </button>
            <button id="cityNextBtn" class="btn btn-dark px-5 py-2 fw-bold rounded-3" disabled onclick="goToMap()">
                التالي <i class="fa-solid fa-chevron-left ms-2"></i>
            </button>
        </div>
    </div>
</div>

<script>
    let selectedCity = "";

    function saveCity(city, el) {
        selectedCity = city;
        // إزالة التحديد من جميع البطاقات
        document.querySelectorAll('.city-card').forEach(c => c.classList.remove('property-active'));
        // إضافة التحديد للبطاقة المختارة
        el.classList.add('property-active');
        // تفعيل زر التالي
        document.getElementById('cityNextBtn').disabled = false;
    }

    function goToMap() {
        if (selectedCity !== "") {
            // التوجه لملف الحفظ الذي سيوجهنا لاحقاً لصفحة الخريطة
            window.location.href = 'save_city_session.php?city=' + encodeURIComponent(selectedCity);
        }
    }
</script>

<?php include 'footer.php'; ?>