<?php
include 'db_connect.php';
include 'header-property.php'; // تأكد أن هذا الملف يحتوي على Bootstrap

// 1. استلام معرف الشاليه من الرابط (ID)
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // تأمين الرقم ليكون عدداً صحيحاً فقط
} else {
    header("Location: index.php"); // إذا لم يوجد ID يرجع للرئيسية
    exit();
}

// 2. جلب بيانات هذا الشاليه من قاعدة البيانات
$query = "SELECT * FROM properties WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<h1>العقار غير موجود!</h1>";
    exit();
}
?>

<div class="container py-5 mt-5" dir="rtl">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold text-dark"><?php echo $row['title']; ?></h1>
            <p class="text-muted">
                <i class="fa fa-map-marker-alt text-pink me-2"></i> <?php echo $row['city']; ?> - <?php echo $row['address']; ?>
            </p>
        </div>
    </div>

    <div class="row g-3 mb-5">
        <div class="col-md-8">
            <img src="img/مسبح شاليه عدن.jpg<?php echo $row['main_image']; ?>" class="img-fluid rounded-4 shadow-sm w-100" style="height: 450px; object-fit: cover;" alt="صورة الشاليه">
        </div>
        <div class="col-md-4">
            <div class="row g-3">
                <div class="col-12">
                    <img src="img/<?php echo $row['main_image']; ?>" class="img-fluid rounded-4 shadow-sm w-100" style="height: 215px; object-fit: cover; opacity: 0.8;">
                </div>
                <div class="col-12">
                    <div class="position-relative">
                        <img src="img/<?php echo $row['main_image']; ?>" class="img-fluid rounded-4 shadow-sm w-100" style="height: 215px; object-fit: cover; opacity: 0.6;">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-dark btn-sm rounded-pill px-3">عرض المزيد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4">
                <h4 class="fw-bold mb-3 border-bottom pb-2">نظرة عامة</h4>
                <div class="row text-center mb-4">
                    <div class="col-3 border-end">
                        <h6 class="text-muted">السعة</h6>
                        <p class="fw-bold mb-0"><?php echo $row['max_capacity']; ?> ضيوف</p>
                    </div>
                    <div class="col-3 border-end">
                        <h6 class="text-muted">النوع</h6>
                        <p class="fw-bold mb-0"><?php echo $row['type']; ?></p>
                    </div>
                    <div class="col-3 border-end">
                        <h6 class="text-muted">تأجير كلي</h6>
                        <p class="fw-bold mb-0"><?php echo $row['is_full'] ? 'نعم' : 'لا'; ?></p>
                    </div>
                    <div class="col-3">
                        <h6 class="text-muted">تأجير جزئي</h6>
                        <p class="fw-bold mb-0"><?php echo $row['is_partial'] ? 'نعم' : 'لا'; ?></p>
                    </div>
                </div>

                <h5 class="fw-bold">الوصف</h5>
                <p class="text-muted" style="line-height: 1.8;">
                    <?php echo nl2br($row['description']); ?>
                </p>
            </div>

            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4">
                <h5 class="fw-bold mb-3">ما الذي يقدمه هذا المكان؟</h5>
                <div class="row">
                    <?php 
                    $amenities = explode(',', $row['amenities']); // نفترض أنها مخزنة ككلمات بينها فواصل
                    foreach ($amenities as $item): 
                    ?>
                    <div class="col-md-6 mb-2">
                        <i class="fa fa-check text-success me-2"></i> <?php echo trim($item); ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4">
                <h5 class="fw-bold mb-3">قواعد الضيوف</h5>
                <p class="text-muted"><?php echo $row['guests_rules']; ?></p>
                <hr>
                <h6 class="fw-bold small">من يتواجد هناك؟</h6>
                <p class="text-muted small"><?php echo $row['who_is_there']; ?></p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-lg p-4 rounded-4 sticky-top" style="top: 100px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-pink mb-0"><?php echo number_format($row['price']); ?> ريال</h3>
                    <span class="text-muted">/ ليلة</span>
                </div>
                
                <form action="booking_process.php" method="POST">
                    <input type="hidden" name="property_id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">اختر التاريخ</label>
                        <input type="date" class="form-control rounded-3" name="book_date" required>
                    </div>
                    <button type="submit" class="btn btn-pink w-100 py-3 rounded-pill fw-bold text-white shadow">احجز الآن</button>
                </form>

                <div class="text-center mt-3">
                    <p class="small text-muted">لن يتم خصم مبالغ الآن</p>
                    <hr>
                    <a href="<?php echo $row['map_link']; ?>" target="_blank" class="text-decoration-none text-dark small fw-bold">
                        <i class="fa fa-map-marked-alt text-pink me-1"></i> عرض على خريطة جوجل
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer-index.php'; ?>