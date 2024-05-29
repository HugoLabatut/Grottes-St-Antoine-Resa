function displayLargePhoto(src) {
    document.getElementById('large-image').src = src;
}

function displaySelectedPhoto() {
    var ancienSelected = document.querySelector('.selected');
    if (ancienSelected) {
        ancienSelected.classList.remove('selected');
    }
    var selectedPhoto = event.target;
    selectedPhoto.classList.add('selected');

    var photoId = selectedPhoto.getAttribute('data-id');
    console.log(photoId);
}
