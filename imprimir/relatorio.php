<?php

    require '../bootstrap.php';
    
    use App\Models\Conexao;
    
    define('FPDF_FONTPATH','font/');
    ob_start ();
    
    $pdf = new FPDF('L', 'cm', 'A4');
   // $pdf->Open();
    $pdf->AddPage();
    //$pdf->SetY(2);
   // $pdf->SetTextColor(0,0,128);

    session_start();
    if(isset($_SESSION["email"]))
    {
        $email = $_SESSION["email"];
    }
    else
    {
        echo "Usuario não logado";
        exit();
    }
  
    $db = Conexao::conecta();
    $sql = $db->prepare("SELECT * FROM tarefas WHERE fk_usuario ="
            . " (SELECT idusuario FROM usuario WHERE email = ?) AND status_tarefa = 'não concluida'");
    $sql->bindParam(1, $email);
    $sql->execute();
    //$pdf->Image(realpath("../upload/teste.jpg"), 1,0,12);
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->cell(0, 1, utf8_decode('Tarefas para serem realizadas'), 0, 1, 'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'I', 12);
    $pdf->cell(1, 1, '', 1, 0, 'C');
    $pdf->cell(7, 1,'Titulo', 1, 0, 'C');
    $pdf->cell(3, 1, 'Data', 1, 0, 'C');
    $pdf->cell(13, 1, utf8_decode('Descricão'), 1, 0, 'C');
    $pdf->cell(3, 1, 'Status', 1, 1, 'C');
   
    $cont = 0;
    foreach ($sql as $resultado) {
        
        $titulo = utf8_decode($resultado["titulo"]);
        $data = $resultado["data"];
        $nova_data = implode("-", array_reverse(explode("-", $data)));
        $descricao = utf8_decode($resultado["descricao"]);
        $status = utf8_decode($resultado["status_tarefa"]);
      
        $pdf->cell(1, 1,++$cont, 1, 0, 'C');
        $pdf->Cell(7, 1, $titulo, 1, 0, 'C');
        $pdf->Cell(3, 1, $nova_data, 1, 0, 'C');
        $pdf->Cell(13, 1, $descricao, 1, 0, 'C');
        $pdf->Cell(3, 1, $status, 1, 1, 'C');
      
    }
    $pdf->Output("arquivo.pdf","I");
?>