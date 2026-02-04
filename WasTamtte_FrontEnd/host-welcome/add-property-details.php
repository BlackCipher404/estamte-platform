<?php 
// تفعيل الذاكرة في أول السطر
if (session_status() === PHP_SESSION_NONE) { session_start(); }

include 'header.php'; 

// التأكد من أن النوع محفوظ
$myType = isset($_SESSION['property_type']) ? $_SESSION['property_type'] : "عقار";
?>

<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-center">تفاصيل الـ <span class="pink-text"><?php echo $myType; ?></span></h2>
                    
                    <form action="save_details.php" method="POST">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">كيف يمكن حجز هذا الـ <?php echo $myType; ?>؟</label>
                            
                            <div class="form-check p-3 border rounded-3 mb-3" id="fullBookingBox">
                                <input class="form-check-input ms-2" type="checkbox" name="booking_type_full" id="fullBooking" value="1" onchange="toggleBookingLogic()">
                                <label class="form-check-label fw-bold" for="fullBooking">
                                    حجز العقار بالكامل
                                    <small class="text-muted d-block fw-light">يتم استئجار المرفق كاملاً لشخص واحد فقط.</small>
                                </label>
                            </div>

                            <div class="form-check p-3 border rounded-3" id="partialBookingBox">
                                <input class="form-check-input ms-2" type="checkbox" name="booking_type_partial" id="partialBooking" value="1" onchange="toggleBookingLogic()">
                                <label class="form-check-label fw-bold" for="partialBooking">
                                    حجز جزئي (تقسيم المرفق)
                                    <small class="text-muted d-block fw-light">يمكن لأكثر من مستخدم حجز أجزاء مختلفة في نفس الوقت.</small>
                                </label>
                            </div>
                        </div>

                        <div id="partialDetails" class="alert alert-light border d-none">
                            <label class="form-label small">عدد الأقسام المتاحة للتقسيم:</label>
                            <input type="number" name="segments_count" class="form-control form-control-sm w-25">
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <button type="button" class="btn btn-light px-4" onclick="history.back()">رجوع</button>
                            <button type="submit" class="btn btn-dark px-5 py-2 fw-bold rounded-3">التالي</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleBookingLogic() {
    const full = document.getElementById('fullBooking');
    const partial = document.getElementById('partialBooking');
    const partialDetails = document.getElementById('partialDetails');

    // المنطق: إذا اختار "جزئي" نفعل "كامل" تلقائياً
    if (partial.checked) {
        full.checked = true;
        full.disabled = true; // نمنعه من إلغاء "كامل" لأنه يتضمنه
        partialDetails.classList.remove('d-none');
    } else {
        full.disabled = false;
        partialDetails.classList.add('d-none');
    }
    
    // تنسيق بصري (اختياري)
    document.getElementById('fullBookingBox').style.borderColor = full.checked ? '#FF385C' : '#dee2e6';
    document.getElementById('partialBookingBox').style.borderColor = partial.checked ? '#FF385C' : '#dee2e6';
}
</script>

<style>
    .pink-text { color: #FF385C; }
    .form-check-input:checked { background-color: #FF385C; border-color: #FF385C; }
</style>

<?php include 'footer.php'; ?>