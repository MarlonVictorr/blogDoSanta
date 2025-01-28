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
  let usuario = document.getElementById("UsuarioInput").value;
  let senha = document.getElementById("senhaInput").value;

  if (usuario == "" || senha == "") {
    swal({
      title: "Atenção!",
      text: "Preencha e tente novamente",
      icon: "warning",
      timer: 3000,
      buttons: false,
    });
    return;
  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText.trim() === "success") {
        swal({
          title: "Sucesso",
          text: "Logado com sucesso",
          icon: "success",
          timer: 3000,
          buttons: false,
        }).then(() => {
          window.location.href = "index.php";
        });
      } else {
        swal({
          title: "Tente novamente",
          text: "Erro ao logar",
          icon: "error",
          timer: 3000,
          buttons: false,
        });
      }
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

function salvarPost() {
  titulo = document.getElementById("tituloPost").value;
  citacoes = document.getElementById("citacoesPost").value;
  imagem = document.getElementById("imagemPost").value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.trim() === "success") {
        swal({
          title: "Sucesso",
          text: "Salvo com sucesso",
          icon: "success",
          timer: 3000,
          buttons: false,
        }).then(() => {
          window.location.href = "index.php";
        });
      } else {
        swal({
          title: "Tente novamente",
          text: "Erro ao salvar",
          icon: "error",
          timer: 3000,
          buttons: false,
        });
      }
    }
  };
  xhttp.open(
    "GET",
    "executar/salvar/createPost.php?titulo=" + titulo + "&citacoes=" + citacoes,
    true
  );
  xhttp.send();
}
