document.addEventListener('DOMContentLoaded', function() {
  const darkModeToggle = document.getElementById('toggleDarkMode');

  darkModeToggle.addEventListener('click', function() {
    const bodyElement = document.getElementById('page-top');
    bodyElement.classList.toggle('dark-mode');
  });
});
