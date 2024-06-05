document.getElementById('fileInput').addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();
        const imgPreview = document.getElementById('imgPreview');
        const previewContainer = document.getElementById('imagePreview');
        const previewDefaultText = previewContainer.querySelector('.image-preview__default-text');

        reader.addEventListener('load', function() {
            imgPreview.setAttribute('src', this.result);
            imgPreview.style.display = 'block';
            previewDefaultText.style.display = 'none';
        });

        reader.readAsDataURL(file);
    }
});
