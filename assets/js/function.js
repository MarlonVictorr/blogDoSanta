document.addEventListener("DOMContentLoaded", function () {
  const backToTopButton = document.querySelector(".back-to-top");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 100) {
      backToTopButton.style.display = "block";
    } else {
      backToTopButton.style.display = "none";
    }
  });

  backToTopButton.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "auto",
    });
  });
});
