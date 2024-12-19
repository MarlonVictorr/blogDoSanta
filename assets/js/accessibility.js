function toggleAccessibilityMenu() {
  const menu = document.getElementById("accessibility-options");
  menu.classList.toggle("hidden");
}

let fontSize = 16;

function increaseFontSize() {
  fontSize += 2;
  document.body.style.fontSize = fontSize + "px";
}

function decreaseFontSize() {
  fontSize = Math.max(12, fontSize - 2);
  document.body.style.fontSize = fontSize + "px";
}

function toggleHighContrast() {
  document.body.classList.toggle("high-contrast");
}

function toggleGrayscale() {
  document.body.classList.toggle("grayscale");
}

function toggleLightBackground() {
  document.body.classList.toggle("light-background");
}

function toggleFont() {
  document.body.classList.toggle("custom-font");
}
