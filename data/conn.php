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


function salvarPost($titulo, $citacoes)
{
    $sql = "INSERT INTO post (titulo, citacoes) VALUES ('$titulo', '$citacoes')";

    $conn = conn();

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Erro ao inserir o post: " . mysqli_error($conn));
    }

    return true;
}
