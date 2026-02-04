<?php 
session_start();
include 'header.php'; 
$myType = $_SESSION['property_type'];
?>

<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-lg p-5 rounded-4 bg-white border-top border-5 border-pink">
            <h3 class="fw-bold mb-4">من هم ضيوفك المتوقعين في الـ <span class="pink-text"><?php echo $myType; ?></span>؟</h3>
            
            <form action="save_rules.php" method="POST">
                
                <div class="mb-4 text-end">
                    <label class="form-label fw-bold">نوع الضيوف المسموح بهم:</label>
                    <div class="d-flex gap-3 flex-wrap">
                        <div class="form-check border p-2 px-4 rounded-pill">
                            <input class="form-check-input" type="checkbox" name="guests_type[]" value="عوائل" id="families">
                            <label class="form-check-label ms-2" for="families">عوائل</label>
                        </div>
                        <div class="form-check border p-2 px-4 rounded-pill">
                            <input class="form-check-input" type="checkbox" name="guests_type[]" value="شباب" id="youth">
                            <label class="form-check-label ms-2" for="youth">شباب</label>
                        </div>
                        <div class="form-check border p-2 px-4 rounded-pill">
                            <input class="form-check-input" type="checkbox" name="guests_type[]" value="نساء فقط" id="women">
                            <label class="form-check-label ms-2" for="women">نساء فقط</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 text-end">
                        <label class="form-label fw-bold">العدد الطبيعي للضيوف</label>
                        <input type="number" name="normal_capacity" class="form-control rounded-3" placeholder="مثلاً 10" required>
                    </div>
                    <div class="col-md-6 text-end">
                        <label class="form-label fw-bold">أقصى عدد مسموح به</label>
                        <input type="number" name="max_capacity" class="form-control rounded-3" placeholder="مثلاً 20" required>
                    </div>
                </div>

                <div class="mb-4 text-end">
                    <label class="form-label fw-bold">قواعد وقوانين المكان:</label>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="form-check form-switch border p-3 rounded-3">
                                <input class="form-check-input" type="checkbox" name="allow_pets" id="pets">
                                <label class="form-check-label fw-bold" for="pets">السماح بالحيوانات</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-switch border p-3 rounded-3">
                                <input class="form-check-input" type="checkbox" name="allow_smoking" id="smoking">
                                <label class="form-check-label fw-bold" for="smoking">التدخين مسموح</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-light px-4 rounded-pill" onclick="history.back()">رجوع</button>
                    <button type="submit" class="btn btn-pink px-5 py-2 fw-bold rounded-pill shadow">حفظ ومتابعة</button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .form-check-input:checked { background-color: #FF385C; border-color: #FF385C; }
    .form-switch .form-check-input { width: 3em; height: 1.5em; cursor: pointer; }
</style>

<?php include 'footer.php'; ?>