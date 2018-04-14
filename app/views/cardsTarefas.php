<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/sb-admin.min.css" >
        <title>Cards Tarefas</title>
    </head>
    <body>
        <?php
        include '../models/TarefasDAO.php';
        include '../models/Conexao.php';
        
        $email = $_SESSION['email'];
        $tarefasDAO = new TarefasDAO();
        $values = $tarefasDAO->listarAtividades($email);
        $sd = new ArrayIterator($values);
        ?>


        <?php while ($sd->valid()) { ?>

            <!-- inicio da lista de tarefas -->
            <div class="col-md-4  mt-4 mb-2">
                <h6>Segunda Feira, 03 de Abril de 2018</h6>
                <div class="card card-login">  
                    <div class="card-header text-right">
                        <div class="dropdown" >
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-tags badge badge-pill badge-danger"> </i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item badge-light" href="" data-toggle="modal" data-target="#editarTarefaModal">Editar</a>
                                <a class="dropdown-item badge-light" href="">Excluir</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-justify"><?php echo $sd->current()->titulo; ?></h5>
                        <p class="card-text text-justify"><?php echo $sd->current()->descricao; ?></p>    
                    </div> 
                </div>
            </div>
        <?php } ?>
        <!-- Fim da lista de tarefas -->

    </div>
    <script src="../../assets/bibliotecas/jquery/jquery.min.js" ></script>
    <script src="../../assets/bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
</body>
</html>