<?php 
session_start();
include 'header.php'; 
?>

<div class="container py-5 mt-5 text-end">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow-lg p-5 rounded-4 bg-white border-top border-5 border-pink">
            <h3 class="fw-bold mb-3">من قد يكون متواجدًا أيضًا؟</h3>
            <p class="text-muted mb-5">يحتاج الضيوف إلى معرفة ما إذا كانوا سيقابلون أشخاصًا آخرين أثناء إقامتهم.</p>
            
            <form action="save_presence.php" method="POST">
                
                <div class="list-group mb-5">
                    
                    <label class="list-group-item d-flex justify-content-between align-items-center p-3 rounded-4 mb-3 border-2 custom-list-item">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-user-check fa-2x pink-text me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0">أنا (المضيف)</h6>
                                <small class="text-muted">سأكون متواجداً لخدمة الضيوف.</small>
                            </div>
                        </div>
                        <input class="form-check-input me-1" type="checkbox" name="presence[]" value="أنا (المضيف)">
                    </label>

                    <label class="list-group-item d-flex justify-content-between align-items-center p-3 rounded-4 mb-3 border-2 custom-list-item">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-users-viewfinder fa-2x pink-text me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0">عائلتي</h6>
                                <small class="text-muted">عائلة المضيف تسكن في جزء منفصل/مشترك.</small>
                            </div>
                        </div>
                        <input class="form-check-input me-1" type="checkbox" name="presence[]" value="عائلة المضيف">
                    </label>

                    <label class="list-group-item d-flex justify-content-between align-items-center p-3 rounded-4 mb-3 border-2 custom-list-item">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-user-group fa-2x pink-text me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0">ضيوف آخرون</h6>
                                <small class="text-muted">هناك غرف أو أقسام أخرى مؤجرة لأشخاص آخرين.</small>
                            </div>
                        </div>
                        <input class="form-check-input me-1" type="checkbox" name="presence[]" value="ضيوف آخرون">
                    </label>

                    <label class="list-group-item d-flex justify-content-between align-items-center p-3 rounded-4 mb-3 border-2 custom-list-item">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-person-shelter fa-2x pink-text me-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0">حارس أو عمال</h6>
                                <small class="text-muted">يتواجد حارس المزرعة/الشاليه بانتظام.</small>
                            </div>
                        </div>
                        <input class="form-check-input me-1" type="checkbox" name="presence[]" value="حارس أو عمال">
                    </label>

                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">مرافق قريبة جداً (اختياري):</label>
                    <input type="text" name="nearby_places" class="form-control rounded-3" placeholder="مثلاً: بقالة قريبة، سوبر ماركت، حديقة...">
                </div>

                <div class="d-flex justify-content-between mt-5 pt-3 border-top">
                    <button type="button" class="btn btn-light px-4 rounded-pill" onclick="history.back()">رجوع</button>
                    <button type="submit" class="btn btn-pink px-5 py-2 fw-bold rounded-pill shadow">التالي</button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .custom-list-item { cursor: pointer; transition: 0.3s; }
    .custom-list-item:hover { background-color: #f8f9fa; border-color: #FF385C; }
    .form-check-input:checked { background-color: #FF385C; border-color: #FF385C; }
    .pink-text { color: #FF385C; }
</style>

<?php include 'footer.php'; ?>