<?php
include('../../data/conn.php');
session_start();

$idPost = $_GET['idPost'];


$resultado = excluirPost($idPost);

if ($resultado) {
    echo "success";
} else {
    echo "error";
}
