<?php

require '../bootstrap.php';

use App\Models\Conexao;

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML("<h1 align =' center'>Tarefas para serem realizadas</h1>");
$mpdf->SetDisplayMode("fullpage");

session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "Usuario não logado";
    exit();
}


$db = Conexao::conecta();
$sql = $db->prepare("SELECT * FROM tarefas WHERE fk_usuario ="
        . " (SELECT idusuario FROM usuario WHERE email = ?) AND status_tarefa = 'não concluida'");
$sql->bindParam(1, $email);
$sql->execute();


$html = " <table>
    <thead>
<tr>
    <th>Titulo</th>
    <th>Data</th>
    <th>Descrição</th>
    <th>Status</th>
</tr>
    </thead>
<tbody>";

foreach ($sql as $resultado) {

    $titulo = $resultado["titulo"];
    $data = $resultado["data"];
    $nova_data = implode("-", array_reverse(explode("-", $data)));
    $descricao = $resultado["descricao"];
    $status = $resultado["status_tarefa"];

    $html = $html . "<tr>
            <td>$titulo </td>
            <td> $nova_data </td>
            <td>$descricao </td>
            <td> $status </td>      
        </tr>";
}
$html = $html . "</tbody>    
</table>";
$mpdf->WriteHTML($html);
$mpdf->Output();
exit();
