<?php 
session_start();
include 'header.php'; 

// استرجاع النوع (شاليه أو مزرعة) لتخصيص النصوص
$type = isset($_SESSION['property_type']) ? $_SESSION['property_type'] : "عقار";
?>

<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="text-center mb-5 animate__animated animate__fadeInDown">
                <h2 class="fw-bold">الخطوة الأخيرة! <span class="pink-text">التسمية والسعر</span></h2>
                <p class="text-muted">أدخل تفاصيل الـ <?php echo $type; ?> الخاص بك للنشر.</p>
            </div>
            
            <form action="complete_registration.php" method="POST">
                
                <div class="card shadow-sm border-0 rounded-4 p-4 mb-4">
                    <div class="mb-4 text-end">
                        <label class="form-label fw-bold d-flex align-items-center justify-content-end">
                             اكتب اسم الـ <?php echo $type; ?> مميزاً <i class="fa-solid fa-signature ms-2 text-secondary"></i>
                        </label>
                        
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white border-end-0 text-pink"><i class="fa-solid fa-quote-right"></i></span>
                            <input type="text" name="title" id="titleInput" class="form-control border-start-0 fw-bold text-dark text-end" 
                                   placeholder="مثلاً: <?php echo $type; ?> ...." required maxlength="50" oninput="updateCount()">
                        </div>
                        <div class="text-start text-muted small mt-1"><span id="charCount">0</span>/50</div>
                    </div>

                    <div class="mb-2 text-end">
                        <label class="form-label fw-bold">وصف المكان</label>
                        <textarea name="description" class="form-control rounded-3 bg-light border-0 text-end" rows="4" 
                                  placeholder="اوصف الجو، المساحة، والخصوصية..."></textarea>
                    </div>
                </div>

                <div class="card shadow-lg border-0 rounded-4 p-5 mb-5 border-top border-5 border-pink position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 p-3 opacity-10">
                        <i class="fa-solid fa-money-bill-wave fa-5x text-pink"></i>
                    </div>
                    
                    <h4 class="fw-bold mb-4 text-center">بكم تريد تأجير الـ <?php echo $type; ?> في الليلة؟</h4>
                    
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6">
                            <div class="input-group input-group-lg border-2 border-pink rounded-pill overflow-hidden shadow-sm">
                                <input type="number" name="price" class="form-control border-0 text-center fw-bold fs-1 text-pink" 
                                       placeholder="00" required min="1000">
                                <span class="input-group-text bg-pink text-white fw-bold border-0 px-4">ر.ي</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4 d-flex justify-content-center gap-4 flex-wrap">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="negotiable" id="offer">
                            <label class="form-check-label fw-bold text-muted" for="offer">السعر قابل للتفاوض</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="instant_booking" id="instant">
                            <label class="form-check-label fw-bold text-muted" for="instant">حجز فوري</label>
                        </div>
                    </div>
                </div>

                <div class="fixed-bottom bg-white border-top p-3 shadow-lg z-3">
                    <div class="container d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-link text-dark fw-bold text-decoration-none" onclick="history.back()">رجوع</button>
                        
                        <button type="submit" class="btn btn-pink px-5 py-3 fw-bold rounded-pill shadow-lg hover-scale">
                            <i class="fa-solid fa-rocket me-2"></i> انشر إعلانك الآن
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateCount() {
        const input = document.getElementById('titleInput');
        document.getElementById('charCount').innerText = input.value.length;
    }
</script>

<style>
    .bg-pink { background-color: #FF385C; }
    .text-pink { color: #FF385C; }
    .btn-pink { background-color: #FF385C; color: white; border: none; transition: 0.3s; }
    .btn-pink:hover { background-color: #d90b3e; transform: translateY(-3px); }
    .hover-scale:hover { transform: scale(1.05); }
    .opacity-10 { opacity: 0.1; }
    input::placeholder { font-size: 0.9rem; font-weight: normal; }
</style>

<?php include 'footer.php'; ?>