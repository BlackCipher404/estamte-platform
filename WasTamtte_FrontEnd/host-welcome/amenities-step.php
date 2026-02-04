<?php 
session_start();
include 'header.php'; 
$myType = isset($_SESSION['property_type']) ? $_SESSION['property_type'] : "العقار";
?>

<style>
    .amenity-card {
        cursor: pointer;
        transition: 0.3s;
        border: 2px solid #f0f0f0;
        text-align: center;
        height: 100%;
    }
    .amenity-card:hover { border-color: #FF385C; background: #fff1f3; }
    .amenity-active { 
        border-color: #FF385C !important; 
        background-color: #fff1f3 !important; 
        box-shadow: 0 4px 15px rgba(255, 56, 92, 0.2);
    }
    .amenity-card i { font-size: 2rem; color: #444; margin-bottom: 10px; transition: 0.3s; }
    .amenity-active i { color: #FF385C; }
    .pink-text { color: #FF385C; }
</style>

<div class="container py-5 mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">ما الذي يميز الـ <span class="pink-text"><?php echo $myType; ?></span> الخاص بك؟</h2>
        <p class="text-muted">اختر جميع المرافق المتوفرة (يمكنك اختيار أكثر من واحد)</p>
    </div>

    <form action="save_amenities.php" method="POST" id="amenitiesForm">
        <h5 class="fw-bold mb-4 border-bottom pb-2 text-end">المرافق الأساسية</h5>
        <div class="row g-3 mb-5">
            <?php 
            $essentials = [
                ['name' => 'مسبح خارجي', 'icon' => 'fa-person-swimming'],
                ['name' => 'مسبح مغلق', 'icon' => 'fa-water'],
                ['name' => 'حديقة واسعة', 'icon' => 'fa-tree'],
                ['name' => 'جلسات خارجية', 'icon' => 'fa-couch'],
                ['name' => 'مظلات شمسيّة', 'icon' => 'fa-umbrella'],
                ['name' => 'ألعاب أطفال', 'icon' => 'fa-child-reaching'],
                ['name' => 'منطقة شواء', 'icon' => 'fa-fire-burner'],
                ['name' => 'إنترنت WiFi', 'icon' => 'fa-wifi'],
            ];
            foreach($essentials as $item) { echo renderAmenity($item); }
            ?>
        </div>

        <h5 class="fw-bold mb-4 border-bottom pb-2 text-end">التجهيزات والرفاهية</h5>
        <div class="row g-3 mb-5">
            <?php 
            $luxury = [
                ['name' => 'مكيفات', 'icon' => 'fa-snowflake'],
                ['name' => 'شلالات مائية', 'icon' => 'fa-water-ladder'],
                ['name' => 'ملعب كرة قدم', 'icon' => 'fa-futbol'],
                ['name' => 'طاولة بلياردو', 'icon' => 'fa-table-cells'],
                ['name' => 'سماعات بلوتوث', 'icon' => 'fa-tty'],
                ['name' => 'مطبخ متكامل', 'icon' => 'fa-kitchen-set'],
                ['name' => 'سخان شمسي', 'icon' => 'fa-sun'],
                ['name' => 'مواقف سيارات', 'icon' => 'fa-car'],
                ['name' => 'حراسة أمنية', 'icon' => 'fa-user-shield'],
                ['name' => 'مجلس شعبي', 'icon' => 'fa-tent'],
            ];
            foreach($luxury as $item) { echo renderAmenity($item); }
            ?>
        </div>

        <input type="hidden" name="selected_amenities" id="amenitiesInput">

        <div class="fixed-bottom bg-white border-top p-3 shadow-lg">
            <div class="container d-flex justify-content-between">
                <button type="button" class="btn btn-link text-dark fw-bold" onclick="history.back()">رجوع</button>
                <button type="submit" class="btn btn-dark px-5 py-2 rounded-3">التالي</button>
            </div>
        </div>
    </form>
</div>

<?php 
function renderAmenity($item) {
    return '
    <div class="col-lg-3 col-md-4 col-6">
        <div class="amenity-card p-4 rounded-4 shadow-sm" onclick="toggleAmenity(\''.$item['name'].'\', this)">
            <i class="fa-solid '.$item['icon'].'"></i>
            <h6 class="fw-bold mb-0 small">'.$item['name'].'</h6>
        </div>
    </div>';
}
?>

<script>
let selectedList = [];

function toggleAmenity(name, el) {
    if (selectedList.includes(name)) {
        selectedList = selectedList.filter(i => i !== name);
        el.classList.remove('amenity-active');
    } else {
        selectedList.push(name);
        el.classList.add('amenity-active');
    }
    document.getElementById('amenitiesInput').value = selectedList.join(', ');
}
</script>

<?php include 'footer.php'; ?>