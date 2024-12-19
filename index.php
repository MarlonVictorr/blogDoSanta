<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./Imagens/logoSanta.png" sizes="32x32" />
  <title>Blog Do Santa</title>
  <link
    href="assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />

  <link href="assets/css/style.css" rel="stylesheet" />
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/function.js"></script>
</head>

<body>


  <header id="header" class="header">
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10  offset-md-2">
            <nav class="navbar">
              <div class="navbar-header">
                <a class="navbar-brand">
                  <img src="./Imagens/logoSanta.png" />
                </a>
              </div>
              <div class="logo">
                <ul>
                  <li><a href="opiniao.php">Opinião</a></li>
                  <li><a href="artigo.php">Artigo</a></li>
                  <li><a href="acessibilidade.php">Acessibilidade</a></li>
                  <li><a href="cultura.php">Cultura</a></li>
                  <li><a href="espiritualidade.php">Espiritualidade</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="text-center">
    <strong>Aqui e a pagina 1</strong>
  </section>



  <div class="text-center" id="footer">
    <div class="footer-top">
      <div class="container">
        <section>

          <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-3"
            style="background-color: #e1306c"
            href="https://www.instagram.com/your-instagram-page"
            target="_blank"
            role="button">
            <i class="bi bi-instagram"></i>
          </a>

          <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-3"
            style="background-color: #1877f2"
            href="https://www.facebook.com/your-facebook-page"
            target="_blank"
            role="button">
            <i class="bi bi-facebook"></i>
          </a>

          <a
            data-mdb-ripple-init
            class="btn text-white btn-floating m-3"
            style="background-color: #71ee58"
            href="https://api.whatsapp.com/send?phone=5567992699299"
            target="_blank"
            role="button">
            <i class="bi bi-whatsapp"></i>
          </a>






        </section>
      </div>
    </div>
  </div>


  <a href="#" class="back-to-top" title="Voltar ao topo">
    <i class="bi bi-arrow-up-circle"></i>
  </a>


  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>

</html>