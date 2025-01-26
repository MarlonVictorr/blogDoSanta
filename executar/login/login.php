<?php
include('../../data/conn.php');


$usuario = $_GET['usuario'];
$senha = $_GET['senha'];


$resultado = verificarUsuario($usuario, $senha);

if (mysqli_num_rows($resultado) > 0) {
    echo "success";
} else {
    echo "error";
}
