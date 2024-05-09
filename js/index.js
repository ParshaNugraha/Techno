function toggleDarkMode() {
  const body = document.body;
  body.classList.toggle("dark-mode");
}


const darkModeSwitch = document.getElementById("darkModeSwitch");


if (localStorage.getItem("darkModeEnabled") === "true") {
  darkModeSwitch.checked = true;
  document.body.classList.add("dark-mode");
}


darkModeSwitch.addEventListener("change", function() {
  if (darkModeSwitch.checked) {
    document.body.classList.add("dark-mode");
    localStorage.setItem("darkModeEnabled", "true");
  } else {
    document.body.classList.remove("dark-mode");
    localStorage.setItem("darkModeEnabled", "false");
  }
});