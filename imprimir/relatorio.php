<?php

require '../bootstrap.php';

use App\Models\Conexao;

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML("<h1 align =' center'>Tarefas a serem realizadas &nbsp; <img src='printer2.png'></img></h1>");
$mpdf->SetDisplayMode("fullpage");

$topo = "To-Do List";
$mpdf->SetHTMLHeader($topo,'O',true);

$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Copyright To-Do List 2018</td>
    </tr>
</table>');


session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "<script> document.location = '../login.php'; </script>";
    exit();
}

//formata a data e hora para o formato de nome
setlocale(LC_ALL, "pt_BR", "pt_BR", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');


$db = Conexao::conecta();
$sql = $db->prepare("SELECT * FROM tarefas WHERE fk_usuario ="
        . " (SELECT idusuario FROM usuario WHERE email = ?) AND status_tarefa = 'não concluida'");
$sql->bindParam(1, $email);
$sql->execute();


$html = '<table align = "center" style="width:80%">';
foreach ($sql as $resultado) {

    $titulo = $resultado["titulo"];
    $data = $resultado["data"];
    $nova_data = implode("-", array_reverse(explode("-", $data)));
    $descricao = $resultado["descricao"];
    $status = $resultado["status_tarefa"];
    
   $dt = ucfirst(utf8_encode(strftime("%A, %d de %B de %Y", strtotime($nova_data))));

    $html .= "<tr>
                   <th align ='left'>$dt</th>
               </tr>
               <tr >
                    <td style='border-style:solid; border-width:0.2px; border-color:black;'>$titulo</td>
                </tr>
                <tr>
                    <td style='border-style:solid; border-width:0.2px; border-color:black;'>$descricao </td>
                </tr>";
   
    $html.='<br> <br> <br>';
}
$html .='</table>';


$mpdf->WriteHTML($html);
$mpdf->Output();
exit();

?>
 