
<script src="../js/jquery-3.4.1.min.js"></script>    
<script src="../js/bootstrap.bundle.min.js"></script>    
<script src="../js/wow.min.js"></script>

<script>
    new WOW().init();
</script>

    <script>
    let selectedType = "";

    function selectProperty(type, el) {
        selectedType = type;
        // إزالة التحديد من الكل
        document.querySelectorAll('.property-card').forEach(c => c.classList.remove('property-active'));
        // إضافة التحديد للمختار
        el.classList.add('property-active');
        // تفعيل زر التالي
        document.getElementById('nextBtn').disabled = false;
    }

    function nextStep() {
    if (selectedType !== "") {
        // نرسل النوع لملف الـ PHP ليقوم بحفظه في الـ Session
        window.location.href = 'save_type.php?type=' + encodeURIComponent(selectedType);
    } else {
        alert("الرجاء اختيار نوع العقار أولاً.");
    }
    }

   

    </script>

 
</body>
</html>