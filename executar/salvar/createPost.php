<?php
include('../../data/conn.php');

$titulo = $_GET['titulo'];
$citacoes = $_GET['citacoes'];
$imagem = $_GET['imagem'];


$sql = salvarPost($titulo, $citacoes, $imagem);


if (mysqli_num_rows($resultado) > 0) {
    echo "success";
} else {
    echo "error";
}
