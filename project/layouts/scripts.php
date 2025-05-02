<!-- Modal HTML -->
<div id="imgModal" class="modal" onclick="closeModal()">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<script>
    // فتح الـ modal عند الضغط على الصورة
    function openModal(imgElement) {
        var modal = document.getElementById("imgModal");
        var modalImg = document.getElementById("modalImage");
        modal.style.display = "block";
        modalImg.src = imgElement.src;
    }

    // إغلاق الـ modal عند الضغط عليه
    function closeModal() {
        document.getElementById("imgModal").style.display = "none";
    }

    // فتح file picker عند الضغط على الصورة
    document.getElementById("image").addEventListener("click", function (e) {
        e.stopPropagation(); // عشان ما يفتحش الـ modal مع الـ file picker
        document.getElementById("file").click();
    });

    // عرض الصورة المرفوعة مباشرة
    document.getElementById("file").addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById("image");
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>