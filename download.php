<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo "usuario não esta logado";
    exit();
}
if (isset($_REQUEST["file"]) && file_exists($_REQUEST["file"])) {// faz o teste se a variavel não esta vazia e se o arquivo realmente existe
    switch (strtolower(substr(strrchr(basename($_REQUEST["file"]), "."), 1))) { // verifica a extensão do arquivo para pegar o tipo
        case "pdf": $tipo = "application/pdf";
            break;
        case "exe": $tipo = "application/octet-stream";
            break;
        case "zip": $tipo = "application/zip";
            break;
        case "doc": $tipo = "application/msword";
            break;
        case "xls": $tipo = "application/vnd.ms-excel";
            break;
        case "ppt": $tipo = "application/vnd.ms-powerpoint";
            break;
        case "gif": $tipo = "image/gif";
            break;
        case "png": $tipo = "image/png";
            break;
        case "jpg": $tipo = "image/jpg";
            break;
        case "mp3": $tipo = "audio/mpeg";
            break;
        case "php": // deixar vazio por seurança
        case "htm": // deixar vazio por seurança
        case "html": // deixar vazio por seurança
    }
    header("Content-Type: " . $tipo); // informa o tipo do arquivo ao navegador
    header("Content-Length: " . filesize($_REQUEST["file"])); // informa o tamanho do arquivo ao navegador
    header("Content-Disposition: attachment; filename=" . basename($_REQUEST["file"])); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
    readfile($_REQUEST["file"]); // lê o arquivo
    exit(); // aborta pós-ações
} else {
    echo "<script> alert('Nenhum arquivo para download!'); </script>";
    if(isset($_REQUEST["id"]))
    {
        $id = $_REQUEST["id"];
         echo "<script> document.location = 'formTarefas.php?id=$id'</script>";
    }
   
   //exit();
}
?>