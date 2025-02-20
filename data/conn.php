<?php
function conn()
{
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bd_blog_santa";

    $conn = new mysqli($host, $usuario, $senha, $bd);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    return $conn;
}

function verificarUsuario($usuario, $senha)
{
    $sql = "SELECT id FROM usuario WHERE nome = '$usuario' AND senha = '$senha'";

    $conn = conn();

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['id'];
    }

    return false;
}


function salvarPost($titulo, $citacoes, $descricao, $page)
{
    $conn = conn();

    $sql = "INSERT INTO post (titulo, citacoes,descricao,page) VALUES ('$titulo', '$citacoes','$descricao',$page)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_insert_id($conn);
    }

    return false;
}

function insertImg($nomeArquivo, $extensao, $idPage, $idPost)
{
    $conn = conn();

    $sql = "INSERT INTO imagem(descricao, ext, idPost, idPage) VALUES ('$nomeArquivo','$extensao',$idPost,$idPage)";

    return mysqli_query($conn, $sql);
}

function dadosPost($page)
{
    $conn = conn();

    $sql = "SELECT * FROM post WHERE page = $page";

    $result = mysqli_query($conn, $sql);

    return $result;
}

function dadosImagem($idPost, $page)
{
    $conn = conn();

    $sql = "SELECT * FROM imagem WHERE idPost = $idPost and idPage = $page";

    $result = mysqli_query($conn, $sql);

    return $result;
}


function excluirPost($idPost)
{
    $conn = conn();

    $sql = "DELETE FROM post WHERE id = $idPost";

    $result = mysqli_query($conn, $sql);

    return $result;
}
