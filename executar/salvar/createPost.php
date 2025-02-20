<?php
include('../../data/conn.php');

$titulo = $_GET['titulo'];
$citacoes = $_GET['citacoes'];
$descricao = $_GET['descricao'];
$page = $_GET['page'];

$idPost = salvarPost($titulo, $citacoes, $descricao, $page);

if ($idPost) {
    echo $idPost;
} else {
    echo "error";
}
