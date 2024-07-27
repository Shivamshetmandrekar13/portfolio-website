// Get the modal
var modal = document.getElementById("artworkModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get all the art items and attach click event
var artItems = document.querySelectorAll('.art-item');
artItems.forEach(function(item) {
    item.onclick = function() {
        var title = this.getAttribute('data-title');
        var description = this.getAttribute('data-description');
        var image = this.getAttribute('data-image');

        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('modalImage').src = image;

        modal.style.display = "block";
    }
});

// for header

document.addEventListener('DOMContentLoaded', function() {
    const toggler = document.querySelector('.navbar-toggler');
    const collapse = document.querySelector('.navbar-collapse');

    toggler.addEventListener('click', function() {
        collapse.classList.toggle('show');
    });
});

//FOR GALLERY
document.addEventListener("DOMContentLoaded", function() {
    const artworks = document.querySelectorAll('.artwork-card');
    const modal = document.getElementById('artwork-modal');
    const modalImg = document.getElementById('modal-img');
    const modalDescription = document.getElementById('modal-description');
    const closeModal = document.querySelector('.close');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    let currentArtwork;

    artworks.forEach(artwork => {
        artwork.addEventListener('click', function() {
            currentArtwork = artwork;
            const imgSrc = artwork.querySelector('img').src;
            const description = artwork.dataset.description;
            modalImg.src = imgSrc;
            modalDescription.textContent = description;
            modal.style.display = 'block';
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    modalDescription.addEventListener('click', function() {
        modalDescription.classList.toggle('full');
        modalImg.classList.toggle('blur');
    });

    prevBtn.addEventListener('click', function() {
        if (currentArtwork.previousElementSibling) {
            currentArtwork = currentArtwork.previousElementSibling;
            updateModalContent(currentArtwork);
        }
    });

    nextBtn.addEventListener('click', function() {
        if (currentArtwork.nextElementSibling) {
            currentArtwork = currentArtwork.nextElementSibling;
            updateModalContent(currentArtwork);
        }
    });

    function updateModalContent(artwork) {
        const imgSrc = artwork.querySelector('img').src;
        const description = artwork.dataset.description;
        modalImg.src = imgSrc;
        modalDescription.textContent = description;
    }
});
