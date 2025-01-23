let cropper;
const imageInput = document.getElementById("profileImageInput");
const previewImage = document.getElementById("previewImage");
const cropButton = document.getElementById("cropButton");
const profileForm = document.getElementById("profileForm");
const userProfile = document.getElementById("userProfile");
const closeBtn = document.getElementById("closeBtn");

userProfile.addEventListener('click', () => {
    profileForm.classList.remove('hidden');
});
closeBtn.addEventListener('click', () => {
    profileForm.classList.add('hidden');
});

imageInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
            cropButton.style.display = 'block';  // Fixed typo here

            if (cropper) cropper.destroy();
            cropper = new Cropper(previewImage, {  // Ensure 'Cropper' is capitalized
                aspectRatio: 1,
                viewMode: 1,
            });
        };
        reader.readAsDataURL(file);
    }
});

cropButton.addEventListener("click", () => {
    cropper.getCroppedCanvas().toBlob((blob) => {
        const formData = new FormData();  // Fixed typo here
        formData.append('cropped_image', blob);

        $.ajax({
            url: '../profile/uploadImage',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Profile picture updated successfully!');
                    profileForm.classList.add('hidden');
                    location.reload();
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                alert('An error occurred. Please try again.');
            }
        });        
    });
});

