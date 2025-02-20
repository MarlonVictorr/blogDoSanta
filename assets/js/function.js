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

function scrollToPosts() {
  const section = document.getElementById("postsSection");
  if (section) {
    window.scrollTo({
      top: section.offsetTop - 50, // Ajuste para garantir que fique visível
      behavior: "smooth",
    });
  }
}

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

function salvarImagem(imagem, page, response) {
  if (!imagem || !imagem.files || imagem.files.length === 0) {
    swal({
      title: "Tente novamente",
      text: "Nenhuma imagem foi selecionada!",
      icon: "error",
      timer: 3000,
      buttons: false,
    });
    return;
  }

  var file = imagem.files[0];
  var formData = new FormData();
  formData.append("imagem", file);
  formData.append("idPage", page);
  formData.append("idPost", response);

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "executar/salvar/upload_img.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        try {
          var resposta = JSON.parse(xhr.responseText);
          swal({
            title: resposta.title,
            text: resposta.msg,
            icon: resposta.icon,
            timer: 3000,
            buttons: false,
          });
        } catch (error) {
          console.error("Erro ao processar JSON: ", error);
        }
      } else {
        swal({
          title: "Erro!",
          text: "Falha ao enviar a imagem. Código HTTP: " + xhr.status,
          icon: "error",
          timer: 3000,
          buttons: false,
        });
      }
    }
  };

  xhr.send(formData);
}

function salvarPost(page) {
  let titulo = document.getElementById("tituloPost").value;
  let citacoes = document.getElementById("citacoesPost").value;
  let descricao = document.getElementById("descricaoPost").value;
  let imagemInput = document.getElementById("imagemPost");

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = this.responseText.trim();
      if (response !== "error") {
        swal({
          title: "Sucesso",
          text: "Salvo com sucesso",
          icon: "success",
          timer: 3000,
          buttons: false,
        });

        setTimeout(() => {
          if (page == 1) {
            window.location.href = "index.php";
          } else if (page == 2) {
            window.location.href = "opiniao.php";
          } else if (page == 3) {
            window.location.href = "artigo.php";
          } else if (page == 4) {
            window.location.href = "acessibilidade.php";
          } else if (page == 5) {
            window.location.href = "cultura.php";
          } else if (page == 6) {
            window.location.href = "espiritualidade.php";
          }
        }, 3000);

        salvarImagem(imagemInput, page, response);
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
    "executar/salvar/createPost.php?titulo=" +
      encodeURIComponent(titulo) +
      "&citacoes=" +
      encodeURIComponent(citacoes) +
      "&descricao=" +
      encodeURIComponent(descricao) +
      "&page=" +
      encodeURIComponent(page),
    true
  );
  xhttp.send();
}

function excluirPost(idPost, page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText.trim() === "success") {
        swal({
          title: "Sucesso",
          text: "Excluido com sucesso",
          icon: "success",
          timer: 3000,
          buttons: false,
        }).then(() => {
          setTimeout(() => {
            if (page == 1) {
              window.location.href = "index.php";
            } else if (page == 2) {
              window.location.href = "opiniao.php";
            } else if (page == 3) {
              window.location.href = "artigo.php";
            } else if (page == 4) {
              window.location.href = "acessibilidade.php";
            } else if (page == 5) {
              window.location.href = "cultura.php";
            } else if (page == 6) {
              window.location.href = "espiritualidade.php";
            }
          }, 3000);
        });
      } else {
        swal({
          title: "Tente novamente",
          text: "Erro ao excluir",
          icon: "error",
          timer: 3000,
          buttons: false,
        });
      }
    }
  };
  xhttp.open("GET", "executar/excluir/excluirPost.php?idPost=" + idPost, true);
  xhttp.send();
}
