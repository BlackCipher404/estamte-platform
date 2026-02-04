

        
        <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <h6 class="section-title text-start text-pink text-uppercase mb-4">اتصل بنا</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>اليمن، صنعاء، شارع الستين</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+967 777 000 000</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@shalihat.com</p>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h6 class="section-title text-start text-pink text-uppercase mb-4">روابط سريعة</h6>
                        <a class="btn btn-link text-white-50" href="">من نحن</a>
                        <a class="btn btn-link text-white-50" href="">سياسة الخصوصية</a>
                        <a class="btn btn-link text-white-50" href="">الشروط والأحكام</a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h6 class="section-title text-start text-pink text-uppercase mb-4">تابعنا</h6>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright border-top py-4 text-center">
                    <p>&copy; 2024 جميع الحقوق محفوظة لـ <span class="text-pink">شاليهاتك</span></p>
                </div>
            </div>
        </div><div class="modal fade" id="loginChoiceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4">
                
                    <div class="modal-header border-0 pb-0 pt-4">
                        <button id="backToChoiceBtn" class="btn btn-sm btn-light rounded-circle me-auto d-none" onclick="showChoiceScreen()" type="button">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal"></button>
                    </div>
                
                    <div class="modal-body p-4 p-md-5 pt-2 text-center">
                    
                        <div id="choice-screen">
                            <h4 class="fw-bold mb-4">كيف تود الانضمام إلينا؟</h4>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="choice-card p-3 border rounded-4 hover-shadow" onclick="showLoginForm('سائح')" style="cursor:pointer">
                                        <i class="fa fa-home fa-3x text-pink mb-3"></i>
                                        <h6 class="fw-bold small">أبحث عن شاليه</h6>
                                        <p class="text-muted" style="font-size: 0.8rem">سائح / زائر</p>
                                        <button class="btn btn-sm btn-outline-pink rounded-pill w-100 mt-2" type="button">دخول</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="choice-card p-3 border rounded-4 hover-shadow" onclick="showLoginForm('مضيف')" style="cursor:pointer">
                                        <i class="fa fa-key fa-3x text-dark mb-3"></i>
                                        <h6 class="fw-bold small">انضم كمضيف</h6>
                                        <p class="text-muted" style="font-size: 0.8rem">صاحب عقار</p>
                                        <button class="btn btn-sm btn-dark rounded-pill w-100 mt-2" type="button">دخول</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="host-onboarding-screen" class="d-none">
                            <h4 class="fw-bold mb-4">ما الذي تود استضافته؟</h4>
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="onboarding-card p-3 border rounded-4 shadow-sm" onclick="selectHostType(this)">
                                        <div class="icon-wrapper mb-2">
                                            <i class="fa-solid fa-umbrella-beach fa-2x text-pink"></i>
                                        </div>
                                        <p class="small fw-bold mb-0">شاليه</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="onboarding-card p-3 border rounded-4 shadow-sm" onclick="selectHostType(this)">
                                        <div class="icon-wrapper mb-2">
                                            <i class="fa-solid fa-tree fa-2x text-success"></i>
                                        </div>
                                        <p class="small fw-bold mb-0">مزرعة</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="onboarding-card p-3 border rounded-4 shadow-sm" onclick="selectHostType(this)">
                                        <div class="icon-wrapper mb-2">
                                            <i class="fa-solid fa-map-location-dot fa-2x text-primary"></i>
                                        </div>
                                        <p class="small fw-bold mb-0">تجربة</p>
                                    </div>
                                </div>
                            </div>
                            <button id="nextStepBtn" class="btn btn-pink w-100 py-3 rounded-4 fw-bold mt-4 shadow-sm" disabled onclick="goToLoginForm()" type="button">
                                التالي <i class="fa fa-arrow-left ms-2"></i>
                            </button>
                        </div>
                    
                    
                        <div id="login-form-screen" class="d-none">
                            <div class="mb-4">
                                <h4 class="fw-bold" id="loginTitle">تسجيل الدخول</h4>
                                <p class="text-muted small" id="loginSubtitle">أهلاً بك في استمتع – وجهتك الأولى للراحة</p>
                            </div>
                        
                            <form onsubmit="event.preventDefault();">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-4" placeholder="email">
                                    <label>البريد أو الهاتف</label>
                                </div>
                            
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-4" placeholder="password">
                                    <label>كلمة المرور</label>
                                </div>
                            
                                <div class="d-flex justify-content-between mb-4 align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label small text-muted" for="rememberMe">تذكرني</label>
                                    </div>
                                    <a href="#" class="text-pink small fw-bold text-decoration-none">نسيت كلمة المرور؟</a>
                                </div>
                            
                                <button class="btn btn-pink w-100 py-3 rounded-4 fw-bold mb-4 shadow-sm" type="button">متابعة</button>
                            
                                <div class="position-relative mb-4">
                                    <hr class="text-muted">
                                    <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 small text-muted">أو</span>
                                </div>
                            
                                <button type="button" class="btn btn-outline-dark w-100 py-2 rounded-4 mb-3 border-2">
                                    <i class="fab fa-google me-2 text-danger"></i> تسجيل عبر جوجل
                                </button>
                            </form>
                        
                            <p class="small text-muted mt-3 mb-0">
                                ليس لديك حساب؟ <a href="#" class="fw-bold text-dark text-decoration-underline" onclick="showSignupScreen()">إنشاء حساب جديد</a>
                            </p>
                        </div>


                        <div id="signup-screen" class="d-none text-end">
                            <div class="mb-4 text-center">
                                <h5 class="fw-bold text-dark">متابعه التسجيل </h5>
                            </div>
                        
                            <form onsubmit="event.preventDefault();">


                                <p class="small text-muted mb-2 fw-bold">الاسم القانوني</p>
                                <div class="row g-2 mb-1">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-top-4 rounded-bottom-0 border-bottom-0" id="firstName" placeholder="الاسم الأول">
                                            <label for="firstName" class="small">الاسم الأول في بطاقة التعريف</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-0">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-bottom-4 rounded-top-0" id="lastName" placeholder="اسم العائلة">
                                            <label for="lastName" class="small">اسم العائلة في بطاقة التعريف</label>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted extra-small mb-3" style="font-size: 11px;">
                                    تأكد من تطابقه مع الاسم الوارد في بطاقة التعريف الحكومية.
                                </p>
                            
                                <p class="small text-muted mb-2 fw-bold">تاريخ الميلاد</p>
                                <div class="form-floating mb-1">
                                    <input type="date" class="form-control rounded-4" id="birthDate" placeholder="تاريخ الميلاد">
                                    <label for="birthDate">تاريخ الميلاد</label>
                                </div>
                                <p class="text-muted extra-small mb-3" style="font-size: 11px;">
                                    للاشتراك، يجب أن لا يقل عمرك عن 18 عاماً.
                                </p>
                            
                                <!-- ===== تم الاستبدال: حقل البريد الإلكتروني -> حقل رقم الجوال مع كود الدولة ===== -->
                                <p class="small text-muted mb-2 fw-bold">معلومات التواصل</p>
                                <div class="input-group mb-1 shadow-sm">
                                    <span class="input-group-text bg-white border-start-0 rounded-start-4 px-3" id="basic-addon1">967+</span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="tel" class="form-control border-end-0 rounded-end-4" id="signupPhone" placeholder="5xxxxxxxx" aria-describedby="basic-addon1">
                                        <label for="signupPhone">رقم الجوال</label>
                                    </div>
                                </div>
                                <p class="text-muted extra-small mb-4" style="font-size: 11px;">
                                    سنرسل لك رمز التأكيد وتفاصيل الحجز عبر الواتساب أو SMS.
                                </p>
                            
                                <p class="extra-small text-muted mb-3" style="font-size: 11px; line-height: 1.5;">
                                    من خلال اختيار <span class="fw-bold text-dark">موافقة ومتابعة</span>، أوافق على 
                                    <a href="#" class="text-pink text-decoration-underline">بنود الخدمة</a> 
                                    و <a href="#" class="text-pink text-decoration-underline">سياسة المدفوعات</a> 
                                    و <a href="#" class="text-pink text-decoration-underline">سياسة الخصوصية</a>.
                                </p>
                                <button class="btn btn-pink w-100 py-3 rounded-4 fw-bold shadow-sm mb-3" type="button" onclick="finishSignup()">
                                    موافقة ومتابعة
                                </button>
                            </form>
                        </div>






                    </div>
                </div>
            </div>
        </div>        


        <script>
    // متغير عالمي لحفظ نوع المستخدم (سائح أو مضيف) عشان نعرف وين نوجهه في النهاية
    let userType = ''; 


    function showLoginForm(type) {
        userType = type; // حفظ النوع المختار
        document.getElementById('choice-screen').classList.add('d-none');
        document.getElementById('backToChoiceBtn').classList.remove('d-none');


        if (type === 'مضيف') {
            document.getElementById('host-onboarding-screen').classList.remove('d-none');
        } else {
            // إعدادات واجهة السياح
            document.getElementById('login-form-screen').classList.remove('d-none');
            document.getElementById('loginTitle').innerText = 'تسجيل دخول السياح';
            document.getElementById('loginSubtitle').innerText = 'أهلاً بك في استمتع – وجهتك الأولى للراحة والاستجمام';
        }
    }


    function selectHostType(element) {
        // إزالة التميز من كل الكروت
        document.querySelectorAll('.onboarding-card').forEach(card => {
            card.classList.remove('onboarding-active');
        });
        // إضافة التميز للكارت المختار
        element.classList.add('onboarding-active');
        // تفعيل زر "التالي"
        document.getElementById('nextStepBtn').disabled = false;
    }


    function goToLoginForm() {
        document.getElementById('host-onboarding-screen').classList.add('d-none');
        document.getElementById('login-form-screen').classList.remove('d-none');
        
        // تخصيص الواجهة للمضيف
        document.getElementById('loginTitle').innerText = 'إكمال بيانات المضيف';
        document.getElementById('loginSubtitle').innerText = 'أهلاً بك في استمتع – ابدأ رحلة عرض عقارك وزيادة أرباحك';
    }


    function showChoiceScreen() {
        // إظهار الشاشة الرئيسية وإخفاء البقية
        document.getElementById('choice-screen').classList.remove('d-none');
        document.getElementById('host-onboarding-screen').classList.add('d-none');
        document.getElementById('login-form-screen').classList.add('d-none');
        document.getElementById('signup-screen')?.classList.add('d-none'); // إخفاء شاشة التسجيل لو كانت مفتوحة
        document.getElementById('backToChoiceBtn').classList.add('d-none');
        document.getElementById('nextStepBtn').disabled = true;


        // إعادة تصفير الكروت
        document.querySelectorAll('.onboarding-card').forEach(card => {
            card.classList.remove('onboarding-active');
        });
    }


    function showSignupScreen() {
        document.getElementById('login-form-screen').classList.add('d-none');
        document.getElementById('signup-screen').classList.remove('d-none');
        document.getElementById('backToChoiceBtn').classList.remove('d-none');
        
        // تعديل زر الرجوع ليعيدك لشاشة تسجيل الدخول
        document.getElementById('backToChoiceBtn').onclick = function() {
            document.getElementById('signup-screen').classList.add('d-none');
            document.getElementById('login-form-screen').classList.remove('d-none');
            // إعادة وظيفة الزر الأصلية (للعودة لشاشة الاختيار)
            this.onclick = showChoiceScreen; 
        };
    }


    // الدالة الجديدة لإنهاء التسجيل والربط مع صفحة الترحيب
    function finishSignup() {
        // هنا يمكن إضافة كود PHP لاحقاً لإرسال البيانات لقاعدة البيانات
        
        if (userType === 'مضيف') {
            // التوجيه لصفحة المضيف الجديدة
            window.location.href = 'host-welcome/host-welcome.php';
        } else {
            // السائح يبقى في الصفحة الرئيسية أو يوجه لصفحة الحجوزات
            alert("تم تسجيلك بنجاح كـ سائح!");
            location.reload();
        }
    }
</script>




<style>
    .hover-shadow:hover {
        border-color: #e91e63 !important;
        background-color: #fff0f5;
        transform: translateY(-5px);
    }
    .btn-outline-pink {
        color: #e91e63;
        border-color: #e91e63;
    }
    .btn-outline-pink:hover {
        background-color: #e91e63;
        color: white;
    }


    
/* تأثير عند الضغط على الحقول */
.form-control:focus {
    border-color: #e91e63 !important;
    box-shadow: 0 0 0 0.25rem rgba(233, 30, 99, 0.1) !important;
    transition: all 0.3s ease-in-out; 
}


/* زر اللون الوردي الخاص بموقعك */
.btn-pink {
    background-color: #e91e63 !important;
    color: white !important;
    border: none;
    transition: 0.3s;
}


.btn-pink:hover {
    background-color: #c2185b !important;
    transform: translateY(-2px);
}


.text-pink {
    color: #e91e63 !important;
}


/* جعل الحواف دائرية أكثر لتشبه تطبيقات العصر */
.rounded-4 {
    border-radius: 12px !important;
}




































</style>


<style>
/* الألوان الأساسية */
:root { 
    --main-pink: #e91e63; 
    --hover-pink: #c2185b; 
}


/* تنسيق الكروت (hover effects) لخيارات السائح والمضيف */
.choice-card, .onboarding-card {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    background: #fff;
    border: 1px solid #eee !important; /* تأكيد الحدود لمنع تداخل البوتستراب */
    cursor: pointer;
}


.choice-card:hover, .onboarding-card:hover {
    transform: translateY(-5px);
    border-color: var(--main-pink) !important;
    box-shadow: 0 10px 20px rgba(233, 30, 99, 0.1) !important;
}


/* التمييز عند اختيار نوع العقار (Onboarding) */
.onboarding-active {
    border-color: var(--main-pink) !important;
    background-color: #fff0f5 !important;
    transform: scale(1.02);
}


/* تنسيق الأيقونات داخل الكروت (دمج الجزء الثاني) */
.icon-wrapper {
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}


.onboarding-card i {
    transition: transform 0.3s ease;
}


.onboarding-card:hover i {
    transform: scale(1.2); /* حركة تفاعلية للأيقونة عند التأشير */
}


/* الأزرار الوردية (متوافقة مع بوتستراب) */
.btn-pink {
    background-color: var(--main-pink) !important;
    color: white !important;
    border: none;
    transition: 0.3s;
}


.btn-pink:hover {
    background-color: var(--hover-pink) !important;
    transform: translateY(-2px);
    color: white !important;
}


.btn-pink:disabled {
    background-color: #ffc1d7 !important;
    transform: none;
    cursor: not-allowed;
}


/* أزرار الحدود الوردية */
.btn-outline-pink {
    color: var(--main-pink) !important;
    border-color: var(--main-pink) !important;
}


.btn-outline-pink:hover {
    background-color: var(--main-pink) !important;
    color: white !important;
}


/* تحسين شكل حقول الإدخال (Inputs) عند التركيز */
.form-control:focus {
    border-color: var(--main-pink) !important;
    box-shadow: 0 0 0 0.25rem rgba(233, 30, 99, 0.15) !important;
}


/* تنسيق التشيك بوكس الخاص ببوتستراب */
.form-check-input:checked {
    background-color: var(--main-pink) !important;
    border-color: var(--main-pink) !important;
}


/* كلاسات مساعدة */
.text-pink { color: var(--main-pink) !important; }
.rounded-4 { border-radius: 16px !important; }


/* تأكيد اتجاه النص بما أننا نستخدم العربي */
body {
    direction: rtl;
    text-align: right;
}
</style>






<style>
/* ستايل المربعات الفارغة والخط المقطع */
.border-dashed {
    border: 2px dashed #dee2e6 !important;
    transition: 0.3s;
}
.property-card-simple {
    transition: 0.3s;
}
.property-card-simple:hover {
    transform: translateY(-5px);
}
.text-pink {
    color: #e91e63 !important;
}
.btn-outline-pink {
    color: #e91e63;
    border-color: #e91e63;
}
.btn-outline-pink:hover {
    background-color: #e91e63;
    color: white;
}
.opacity-50 { opacity: 0.5; }
.opacity-25 { opacity: 0.25; }










/* الألوان واللمسات الخاصة بهبة */
:root {
    --pink-color: #fa8aaf;
}


.text-pink {
    color: var(--pink-color) !important;
}


.bg-pink {
    background-color: var(--pink-color) !important;
}


.btn-pink {
    background-color: var(--pink-color);
    border-color: var(--pink-color);
    color: white;
}


.btn-pink:hover {
    background-color: #d81b60;
    color: white;
}


.btn-outline-pink {
    color: var(--pink-color);
    border-color: var(--pink-color);
}


.btn-outline-pink:hover {
    background-color: var(--pink-color);
    color: white;
}


.border-pink {
    border-color: var(--pink-color) !important;
}


/* حركة الكروت وتنسيقها */
.room-item {
    transition: 0.5s;
    border-bottom: 3px solid transparent;
}


.room-item:hover {
    transform: translateY(-10px);
    border-bottom: 3px solid var(--pink-color);
}


.border-dashed {
    border-style: dashed !important;
    border-width: 2px !important;
}


.opacity-50 {
    opacity: 0.5;
}


/* --- الحاوية الخارجية مع خاصية المغناطيس --- */
.horizontal-scroll-wrapper {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    overflow-y: hidden;
    gap: 24px;                 /* المسافة بين الكروت */
    padding: 15px 5px;
    scroll-behavior: smooth;
    
    /* إخفاء شريط التمرير */
    scrollbar-width: none; 
    -ms-overflow-style: none;
    
    /* خاصية التثبيت المغناطيسي */
    scroll-snap-type: x mandatory; 
}


.horizontal-scroll-wrapper::-webkit-scrollbar {
    display: none;
}


/* --- الكرت الداخلي --- */
.scroll-item {
    flex: 0 0 auto;
    width: 300px;             /* عرض ثابت للكرت */
    scroll-snap-align: start; /* نقطة التثبيت عند بداية الكرت */
}


/* --- أزرار التحكم --- */
.scroll-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 1px solid #ddd;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s;
    color: #333;
    display: flex;
}
.scroll-btn:hover {
    background: #e91e63;
    color: #fff;
    border-color: #e91e63;
}




</style>


    
<script>
function scrollContainer(containerId, direction) {
    const container = document.getElementById(containerId);
    // نحدد مسافة القفزة (عرض عنصر واحد تقريباً)
    const scrollAmount = 350; 

    if (direction === 'next') {
        // التحريك لليسار (التالي)
        container.scrollBy({
            left: -scrollAmount, 
            behavior: 'smooth'
        });
    } else {
        // التحريك لليمن (السابق)
        container.scrollBy({
            left: scrollAmount, 
            behavior: 'smooth'
        });
    }
}
</script>

    </div>


    <script src="js/jquery-3.4.1.min.js"></script>    
    <script src="js/bootstrap.bundle.min.js"></script>    
    <script src="js/bootstrap.js"></script> 
    <script src="js/tiny-slider.js"></script>
    <script src="js/wow.min.js"></script>


    <script>
        new WOW().init();
    </script>
  


</body>


</html>



