<?php
include('../../data/conn.php');
session_start();

$usuario = $_GET['usuario'];
$senha = $_GET['senha'];


$resultado = verificarUsuario($usuario, $senha);

if ($resultado) {
    $_SESSION['id'] = $resultado;
    echo "success";
} else {
    echo "error";
}
