<?php include 'header.php'; ?>




<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5 order-2 order-lg-1">
            <div class="step-content-box animate__animated animate__fadeIn" style="max-width: 500px;">
                <span class="fw-bold text-muted small mb-2 d-block">الخطوة 1</span>
                <h1 class="display-6 fw-bold mb-4">أخبرنا عن <span class="pink-text">شاليهك أو مزرعتك</span></h1>
                <p class="text-muted mb-5">اختر نوع العقار الذي ترغب في تأجيره ليبدأ الضيوف في العثور عليك.</p>
                
                <div class="row g-4">
                    <div class="col-6">
                        <div class="property-card text-center p-4 rounded-4 shadow-sm" onclick="selectProperty('شاليه', this)">
                            <i class="fa-solid fa-umbrella-beach fa-3x mb-3 text-secondary"></i>
                            <h6 class="fw-bold">شاليه</h6>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="property-card text-center p-4 rounded-4 shadow-sm" onclick="selectProperty('مزرعة', this)">
                            <i class="fa-solid fa-wheat-awn fa-3x mb-3 text-secondary"></i>
                            <h6 class="fw-bold">مزرعة</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 bg-light d-flex align-items-center justify-content-center order-1 order-lg-2">
            <img src="../img/مسبح 3.jpg" 
                 class="img-fluid animate__animated animate__zoomIn" style="max-width: 70%;">
        </div>
    </div>
</div>

<div class="fixed-bottom bg-white border-top shadow-lg">
    <div class="progress rounded-0" style="height: 6px;">
        <div class="progress-bar bg-dark" style="width: 33%;"></div>
    </div>
    <div class="container-fluid d-flex justify-content-between align-items-center p-3 px-lg-5">
        <button class="btn btn-link text-dark fw-bold text-decoration-underline" onclick="history.back()">رجوع</button>
        <button id="nextBtn" class="btn btn-dark px-5 py-2 fw-bold rounded-3" disabled onclick="nextStep()">التالي</button>
    </div>
</div>
<?php include 'footer.php'; ?>
