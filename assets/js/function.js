document.addEventListener("DOMContentLoaded", function () {
  const backToTopButton = document.querySelector(".back-to-top");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 100) {
      backToTopButton.classList.add("show");
    } else {
      backToTopButton.classList.remove("show");
    }
  });

  backToTopButton.addEventListener("click", function (e) {
    e.preventDefault();

    const scrollToTop = () => {
      const c = document.documentElement.scrollTop || document.body.scrollTop;
      if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        window.scrollTo(0, c - c / 8);
      }
    };

    scrollToTop();
  });
});

function logar() {
  usuario = document.getElementById("UsuarioInput").value;
  senha = document.getElementById("senhaInput").value;

  if (usuario == "" || senha == "") {
    alert("Preencha os campos");
  }
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert("Logado com sucesso");
    }
  };
  xhttp.open(
    "GET",
    "executar/login/login.php?usuario=" + usuario + "&senha=" + senha,
    true
  );
  xhttp.send();
}

document.addEventListener("DOMContentLoaded", function () {
  var toggleButton = document.getElementById("toggleSenha");
  if (toggleButton) {
    toggleButton.addEventListener("click", function () {
      var senha = document.getElementById("senhaInput");
      var icone = this.querySelector("i");
      if (senha.type === "password") {
        senha.type = "text";
        icone.classList.remove("bi-eye");
        icone.classList.add("bi-eye-slash");
      } else {
        senha.type = "password";
        icone.classList.remove("bi-eye-slash");
        icone.classList.add("bi-eye");
      }
    });
  }
});
