function toggleMenu() {
    const menu = document.querySelector(".menu-links");
    const icon = document.querySelector(".hamburger-icon");
    menu.classList.toggle("open");
    icon.classList.toggle("open");
}

const darkModeToggle = document.getElementById("darkModeToggle");

darkModeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    darkModeToggle.textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
});

// Open Modal on Image Click
document.querySelectorAll('.project-img').forEach(img => {
    img.addEventListener('click', function () {
        const modal = document.getElementById('imgModal');
        const modalImg = document.getElementById('modalImage');
        modal.style.display = 'flex';
        modalImg.src = this.src;
    });
});

// Close Modal
function closeModal() {
    document.getElementById('imgModal').style.display = 'none';
}
var fullImageBox = document.getElementById('fullImageBox');
var fullImage = document.getElementById('fullImage');


document.getElementById('crossIcon').addEventListener('click', function () {
    fullImageBox.style.display = 'none';
})

function openFullImage(src) {
    fullImageBox.style.display = 'flex';
    fullImage.src = src;
}
// Handle form submission
function handleFormSubmit(event) {
  event.preventDefault(); // Prevent default form submission

  // Show success message
  document.getElementById('successMessage').style.display = 'block';

  // Hide the form
  document.getElementById('contactForm').style.display = 'none';

  // Redirect to home after 3 seconds
  setTimeout(function() {
    window.location.href = '/'; // Redirect to homepage
  }, 3000); // 3 seconds delay
}
