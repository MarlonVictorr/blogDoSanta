<?php

include('./data/conn.php');

session_start();

$page = 1;

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="icon" href="./Imagens/logoSanta.png" sizes="32x32" />
  <title>Blog Do Santa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <link href="assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@your-library/accessibility.min.css">
  <script src="assets/js/function.js"></script>
  <script src="assets/js/accessibility.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <header id="header" class="header">
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10  offset-md-2">
            <nav class="navbar">
              <div class="navbar-header">
                <a class="navbar-brand offset-md-4" href="index.php">
                  <img src="./Imagens/logoSanta.png">
                </a>
              </div>
              <div class="logo">
                <ul>
                  <li><a href="opiniao.php">Opinião</a></li>
                  <li><a href="artigo.php">Artigo</a></li>
                  <li><a href="acessibilidade.php">Acessibilidade</a></li>
                  <li><a href="cultura.php">Cultura</a></li>
                  <li><a href="espiritualidade.php">Espiritualidade</a></li>

                  <?php
                  if (isset($_SESSION['id'])) {
                    echo ' <li><a href="logoff.php"><i class="bi bi-door-closed"></i></a></li>';
                  } else {
                    echo ' <li><a data-bs-toggle="modal" data-bs-target="#modalSanta"><i class="bi bi-lock"></i></a></li>';
                  }
                  ?>

                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container-body">
    <div class="content">
      <div id="carouselExampleControls" class="carousel slide featured-section" data-bs-ride="carousel">
        <div class="carousel-inner featured-container">
          <div class="carousel-item active">
            <div class="post-slide">
              <div class="post-image">
                <img src="./Imagens/opiniaoDestaque.png" alt="Imagem sobre Opinião">
              </div>
              <div class="post-details">
                <span class="category-tag">Opinião</span>
                <h2 class="post-title">Reflexões Que Desafiam</h2>
                <p class="post-excerpt">Uma perspectiva crítica para estimular a reflexão.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="post-slide">
              <div class="post-image">
                <img src="./Imagens/artigoDestaque.jpg" alt="Imagem sobre Artigo">
              </div>
              <div class="post-details">
                <span class="category-tag">Artigo</span>
                <h2 class="post-title">Amplie Seu Conhecimento</h2>
                <p class="post-excerpt">Descubra novas perspectivas em nossos artigos informativos.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="post-slide">
              <div class="post-image">
                <img src="./Imagens/acessibilidadeDestaque.png" alt="Imagem sobre acessibilidade digital">
              </div>
              <div class="post-details">
                <span class="category-tag">Acessibilidade</span>
                <h2 class="post-title">A Importância da Acessibilidade</h2>
                <p class="post-excerpt">Como tornar a internet mais inclusiva para todos os usuários. Descubra práticas e ferramentas para melhorar a acessibilidade do seu site.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="post-slide">
              <div class="post-image">
                <img src="./Imagens/culturaDestaque.png" alt="Imagem sobre cultura cuiabana">
              </div>
              <div class="post-details">
                <span class="category-tag">Cultura</span>
                <h2 class="post-title">Cultura Cuiabana: Tradições e Modernidade</h2>
                <p class="post-excerpt">Um olhar sobre as transformações culturais de Cuiabá e como as tradições se mantêm vivas na era moderna.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="post-slide">
              <div class="post-image">
                <img src="./Imagens/espiritualidadeDestaque.png" alt="Imagem sobre espiritualidade">
              </div>
              <div class="post-details">
                <span class="category-tag">Espiritualidade</span>
                <h2 class="post-title">Reflexões Sobre Espiritualidade</h2>
                <p class="post-excerpt">A busca pelo equilíbrio espiritual na vida contemporânea e como encontrar paz interior em meio ao caos.</p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>

      <?php
      $dados = dadosPost($page);

      if (mysqli_num_rows($dados) > 0) {
        echo '<section id="postsSection" class="featured-section">';
        echo '<div class="featured-container">';

        while ($row = mysqli_fetch_assoc($dados)) {
          $idPost = $row['id'];
          $titulo = mb_strtoupper($row['titulo'], 'UTF-8');
          $descricao = $row['descricao'];
          $citacoes = $row['citacoes'];
          $date_post = date("d/m/Y H:i:s", strtotime($row['date_post']));


          $dadosImagem = dadosImagem($idPost, $page);
          $imagemTag = '';
          while ($imgRow = mysqli_fetch_array($dadosImagem)) {
            $descricaoImagem = $imgRow['descricao'];
            $ext = $imgRow['ext'];


            $caminhoImagem = "Imagens/$descricaoImagem.$ext";
            if (file_exists($caminhoImagem)) {
              $imagemTag .= "<img class='w-100' src='$caminhoImagem' alt='$titulo'>";
            }
          }


          $postClass = empty($imagemTag) ? 'no-image' : '';

          echo "
      <div class='post-slide $postClass'>
          " . (!empty($imagemTag) ? "<div class='post-image'>$imagemTag</div>" : "") . "
          <div class='post-details'>
              <h2 class='post-title'>$titulo</h2>
              <span class='category-tag'> BY /  $citacoes $date_post</span>
              <p class='post-excerpt'>$descricao</p>
          </div>";

          if (isset($_SESSION['id'])) {
            echo "
              <div class='post-actions'>
                  <a href='#!' class='btn btn-outline-danger' onclick='excluirPost($idPost,$page)'>
                      <i class='bi bi-trash'></i>
                  </a>
              </div>";
          }

          echo "
      </div>";
        }

        echo '</div>';
        echo '</section>';
      } else {
        echo "<div class='container DivPost'>
        
        <p class='text-center'>Nenhum post encontrado.</p>
      
        </div>";
      }
      ?>




      <div class="modal fade" id="modalSanta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="labelHeader" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modalBlog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="labelHeader">Login</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="UsuarioInput" class="form-label">Usuário:</label>
                  <input type="text" id="UsuarioInput" class="form-control" placeholder="Digite seu usuário">
                </div>
                <div class="col-md-6 position-relative">
                  <label for="senhaInput" class="form-label">Senha:</label>
                  <div class="input-group">
                    <input type="password" id="senhaInput" class="form-control" placeholder="Digite sua senha">
                    <button type="button" class="btn" id="toggleSenha">
                      <i class="bi bi-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="logar()">Login</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="labelHeader" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modalBlog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="labelHeader">Novo Post</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-md-12">
                  <label for="UsuarioInput" class="form-label">Titulo: <span class="text-danger">*</span></label>
                  <input type="text" id="tituloPost" class="form-control" placeholder="Digite o Titulo">
                </div>
                <div class="col-md-12">
                  <label for="citacoes" class="form-label">Citações:</label>
                  <input type="text" id="citacoesPost" class="form-control" placeholder="Citações">
                </div>
                <div class="col-md-12">
                  <label for="descricao" class="form-label">Descricao:</label>
                  <textarea id="descricaoPost" class="form-control" placeholder="Descrição"></textarea>
                </div>
                <div class="col-md-12">
                  <label class="form-label">Adicionar Imagem: <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <input type="file" class="form-control" id="imagemPost" accept="image/*" placeholder="Clique para adicionar uma imagem">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="salvarPost(<?php echo $page ?>)">Salvar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center footer">
        <div class="footer-top">
          <div class="container">
            <section id="container">

              <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-3"
                style="background-color: #e1306c"
                href="https://www.instagram.com/bloguedosanta/"
                target="_blank"
                role="button">
                <i class="bi bi-instagram"></i>
              </a>

              <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-3"
                style="background-color: #1877f2"
                href="https://www.facebook.com/profile.php?id=61571906819347"
                target="_blank"
                role="button">
                <i class="bi bi-facebook"></i>
              </a>

              <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-3"
                style="background-color: #71ee58"
                href="https://api.whatsapp.com/send?phone=5565999724951"
                target="_blank"
                role="button">
                <i class="bi bi-whatsapp"></i>
              </a>

              <?php
              if (isset($_SESSION['id'])) {
                echo '<a data-mdb-ripple-init
        class="btn btn-floating m-3"
        style="background-color:rgb(10, 10, 10)"
        role="button" data-bs-toggle="modal" data-bs-target="#modalPost">
        <i class="bi bi-plus-lg text-white"></i>
    </a>';
              }
              ?>

            </section>


          </div>
        </div>
      </div>


      <a href="#" class="back-to-top" title="Voltar ao topo">
        <i class="bi bi-arrow-up-circle text-warning"></i>
      </a>

      <div class="menuAcessibilidade">
        <p>
          <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseAcessibilidade" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-universal-access-circle"></i>
          </a>
        </p>
        <div class="active collapse menu" id="collapseAcessibilidade">
          <button onclick="increaseFontSize()">A+</button>
          <button onclick="decreaseFontSize()">A-</button>
          <button onclick="toggleHighContrast()">Contraste</button>
          <button onclick="toggleGrayscale()">Escala de Cinza</button>
          <button onclick="toggleLightBackground()">Fundo Claro</button>
          <button onclick="toggleFont()">Alterar Fonte</button>
        </div>
      </div>

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
    </div>


    <footer class="footerInfo">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <h5 class="offset-md-4 text-center">Sobre Mim</h5>
            <p class="offset-md-4">
              Cuiabano de chapa e cruz, Filho da Terra com Italiano. Pai. Advogado. Técnico do TCE/MT. Aposentado por invalidez.
              <span class="offset-md-2">Surdo, Deficiente Físico. Cidadão. Povo.</span>
            </p>

          </div>

          <div class="col-md-6">
            <h5 class="offset-md-2">Contato</h5>
            <p class="offset-md-1 mt-2">
              <i class="bi bi-envelope emailIcon"></i>
              <a class="ms-1" href="https://mail.google.com/mail" target="_blank">bloguedosanta@gmail.com</a>
              <br>
              <i class="bi bi-telephone telefoneIcon"></i>
              <span class="ms-1">(65) 9 9972-4951</span>
            </p>
          </div>
        </div>
      </div>
      <div class="text-center">
        <p><b>©</b> 2025 Santalucia, Paulo</p>
      </div>
    </footer>
  </div>


</body>

</html>