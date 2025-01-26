<?php
function conn($sql)
{
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bd_blog_santa";

    $mysqli = new mysqli($host, $usuario, $senha, $bd);

    $sql = mysqli_query($mysqli, $sql);

    return $sql;
}



function verificarUsuario($usuario, $senha)
{
    $sql = "SELECT * FROM usuario where nome = '$usuario' and senha = '$senha'";

    $sql = conn($sql);

    return $sql;
}

function salvarPost($titulo, $citacoes, $imagem)
{
    $sql = "INSERT INTO post(titulo, citacoes, imagem) VALUES ('$titulo',' $citacoes','$imagem')";

    $sql = conn($sql);

    return $sql;
}
