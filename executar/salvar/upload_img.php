<?php
include('../../data/conn.php');

$response = [
    "status" => false,
    "msg"    => "Erro ao processar a requisição",
    "icon"   => "error",
    "title"  => "Erro"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $idPage = $_POST['idPage'];
        $idPost = $_POST['idPost'];
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $nomeArquivo = pathinfo($_FILES['imagem']['name'], PATHINFO_FILENAME); // Obtém apenas o nome sem a extensão

        // Caminho corrigido para Windows
        $destino = 'C:' . DIRECTORY_SEPARATOR . 'xampp' . DIRECTORY_SEPARATOR . 'htdocs' . DIRECTORY_SEPARATOR . 'blogDoSanta' . DIRECTORY_SEPARATOR . 'Imagens' . DIRECTORY_SEPARATOR . $nomeArquivo . '.' . $extensao;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            if (insertImg($nomeArquivo, $extensao, $idPage, $idPost)) {
                $response["status"] = true;
                $response["icon"] = "success";
                $response["title"] = "Sucesso";
                $response["msg"] = "Imagem carregada com sucesso!";
            } else {
                $response["msg"] = "Erro ao salvar no banco de dados.";
            }
        } else {
            $response["msg"] = "Erro ao mover a imagem para o servidor.";
        }
    } else {
        $response["msg"] = "Nenhuma imagem foi enviada ou ocorreu um erro no upload.";
    }
}

echo json_encode($response);
