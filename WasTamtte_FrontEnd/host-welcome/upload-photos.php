<?php 
session_start();
include 'header.php'; 
// تحديد النوع لعرضه في العنوان (مزرعة أو شاليه)
$myType = isset($_SESSION['property_type']) ? $_SESSION['property_type'] : "عقارك";
?>

<div class="container py-5 mt-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-10">
            <h2 class="fw-bold mb-3">أضف بعض الصور عن "<?php echo $myType; ?>"</h2>
            <p class="text-muted mb-5">ستحتاج إلى 5 صور للبدء. ويمكنك إضافة المزيد أو إجراء تغييرات لاحقًا.</p>

            <form action="save_photos.php" method="POST" enctype="multipart/form-data" id="photoForm">
                
                <div class="upload-area border-2 border-dashed rounded-4 p-5 mb-4 d-flex flex-column align-items-center justify-content-center bg-light" 
                     id="dropZone" onclick="document.getElementById('fileInput').click()">
                    
                    <div class="icon-box mb-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/685/685655.png" alt="Camera" style="width: 80px; opacity: 0.6;">
                    </div>
                    
                    <button type="button" class="btn btn-outline-dark fw-bold px-4 py-2 rounded-3 mb-2">إضافة صور</button>
                    <p class="small text-muted">أو اسحب الصور وأفلتها هنا</p>
                    
                    <input type="file" name="property_images[]" id="fileInput" multiple accept="image/*" class="d-none" onchange="previewImages()">
                </div>

                <div id="previewContainer" class="row g-3 mb-5"></div>

                <div class="fixed-bottom bg-white border-top p-3 shadow-lg">
                    <div class="container d-flex justify-content-between">
                        <button type="button" class="btn btn-link text-dark fw-bold text-decoration-none" onclick="history.back()">رجوع</button>
                        <button type="submit" id="nextBtn" class="btn btn-dark px-5 py-2 rounded-3" disabled>التالي</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .upload-area { cursor: pointer; min-height: 400px; transition: 0.3s; border: 2px dashed #ccc; }
    .upload-area:hover { border-color: #FF385C; background-color: #fff1f3 !important; }
    .preview-img { width: 100%; height: 150px; object-fit: cover; border-radius: 12px; }
    .img-card { position: relative; }
    .remove-badge { position: absolute; top: 5px; right: 5px; cursor: pointer; background: rgba(0,0,0,0.6); color: white; border-radius: 50%; width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; }
</style>

<script>
    function previewImages() {
        const input = document.getElementById('fileInput');
        const container = document.getElementById('previewContainer');
        const nextBtn = document.getElementById('nextBtn');
        container.innerHTML = "";

        if (input.files.length > 0) {
            // تفعيل الزر إذا تم اختيار صور (يفضل برمجياً طلب 5 صور كما في الصورة)
            if(input.files.length >= 5) {
                nextBtn.disabled = false;
            } else {
                alert("يرجى اختيار 5 صور على الأقل");
                nextBtn.disabled = true;
            }

            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = "col-md-3 col-6 img-card";
                    div.innerHTML = `
                        <img src="${e.target.result}" class="preview-img shadow-sm border">
                        <span class="remove-badge" onclick="this.parentElement.remove()">×</span>
                    `;
                    container.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }
    }
</script>

<?php include 'footer.php'; ?>