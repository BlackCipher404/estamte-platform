<?php 
session_start();
include 'header.php'; 
$city = isset($_SESSION['city']) ? $_SESSION['city'] : "اليمن";
?>

<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-lg p-5 rounded-4 bg-white">
            <h3 class="fw-bold mb-4">تحديد الموقع في <span class="pink-text"><?php echo $city; ?></span></h3>
            
            <form action="save_location.php" method="POST">
                <div class="mb-4 text-end">
                    <label class="form-label fw-bold small">العنوان التفصيلي (الشارع / الحي)</label>
                    <input type="text" name="address" class="form-control rounded-3 border-2" placeholder="مثلاً: شارع الخمسين - بجوار كذا..." required>
                </div>

                <div class="mb-4 text-end">
                    <label class="form-label fw-bold small text-pink">انسخ رابط قوقل ماب هنا</label>
                    <div class="input-group">
                        <input type="url" name="map_link" id="mapInput" class="form-control rounded-start-3" placeholder="https://goo.gl/maps/..." required oninput="verifyMap()">
                        <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-map-location-dot pink-text"></i></span>
                    </div>
                </div>

                <div id="verifyBox" class="animate__animated animate__fadeIn d-none">
                    <div class="alert alert-warning border-0 shadow-sm rounded-4 text-center">
                        <i class="fa-solid fa-thumbtack fa-2x mb-2 text-danger"></i>
                        <h6 class="fw-bold">تأكد من موقع الدبوس!</h6>
                        <p class="small mb-0">هل يظهر الدبوس فوق الـ <?php echo $_SESSION['property_type']; ?> بالضبط؟</p>
                    </div>
                    
                    <div class="map-preview border rounded-4 mb-4" style="height: 250px; background: #f8f9fa;">
                         <iframe id="mapFrame" src="" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-light px-4 rounded-pill" onclick="history.back()">رجوع</button>
                    <button type="submit" id="finalNextBtn" class="btn btn-pink px-5 py-2 fw-bold rounded-pill shadow">نعم، هذا هو الموقع الصحيح</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function verifyMap() {
    const url = document.getElementById('mapInput').value;
    const verifyBox = document.getElementById('verifyBox');
    const mapFrame = document.getElementById('mapFrame');

    // التعديل هنا: إذا كان الرابط يحتوي على كلمة google.com أو maps (يعني لصق رابط)
    if (url.includes('google.com') || url.includes('maps')) {
        
        // 1. إظهار الصندوق المخفي (الملاحظة)
        verifyBox.classList.remove('d-none');
        
        // 2. محاولة عرض الموقع داخل الإطار
        // نستخدم regex لتحويل الرابط العادي إلى رابط embed عشان يشتغل داخل الـ iframe
        let embedUrl = url.replace("https://goo.gl/maps/", "https://maps.google.com/maps?q=");
        mapFrame.src = embedUrl + "&output=embed";

    } else {
        // إذا مسح الرابط، تختفي الملاحظة
        verifyBox.classList.add('d-none');
    }
    }

</script>

<?php include 'footer.php'; ?>