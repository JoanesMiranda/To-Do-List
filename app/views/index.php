<?php
include '../models/TarefasDAO.php';
include '../models/Conexao.php';
include '../models/UsuarioDAO.php';
?>
﻿<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/sb-admin.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/estilos.css" >
        <title>Principal</title>
    </head>

    <body class="bg-dark fixed-nav sticky-footer" id="pageTop">
        <?php
        session_start();
        if (!isset($_SESSION["email"])) {
            echo "<script> document.location = './login.php'; </script>";
            exit();
        }else{
            $email = $_SESSION['email'];
            $usuarioDAO = new UsuarioDAO();
        }
        if (isset($_REQUEST["logout"]) && $_REQUEST["logout"] == true) {
            unset($_SESSION["email"]);
            echo "<script> document.location = './login.php'; </script>";
            exit();
        }
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href=""><?php echo $usuarioDAO->retornaUsuario($email)  ?></a>
            <button class="navbar-toggler navbar-toggler-rigth" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarPrincipal">
                <ul class="navbar-nav navbar-sidenav">
                    <li class="nav-item" data-togle="tooltip" data-placement = "rigth">
                        <a class="nav-link collapse" href="index.php">
                            <i class="fa fa-fw fa-clipboard"> </i>
                            <span class="nav-link-text">Lista de Tarefas</span>
                        </a>
                    </li>
                    <li class="nav-item" data-togle="tooltip" data-placement = "rigth">
                        <a class="nav-link nav-link-collapse collapse" href="#linksPaginas" data-toggle="collapse">
                            <i class="fa fa-fw fa-gears"> </i>
                            <span class="nav-link-text">Configurações</span>
                        </a>
                        <ul class="sidenav-second-level collapse " id="linksPaginas">
                            <li>
                                <a href="#">Idioma</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Inicio do esconder menu lateral -->
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a id="sidenavToggler" class="nav-link text-center">
                            <i class="fa fa-fw fa-angle-left"></i>                           
                        </a>
                    </li> 
                </ul>
                <!-- fim do esconder menu lateral -->

                <ul class="navbar-nav ml-auto">
                    <!-- Inicio do item pesquisar do topo -->
                    <li class="nav-item">
                        <form method="POST" action="index.php" class="form-inline my-2 my-lg-0 mr-lg-2">
                            <input type="hidden" name="action" value="pesquisar">
                            <div class="input-group">
                                <input type="search" name="pesquisar" class="form-control" placeholder="Pesquisar por...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                    <!-- Fim do item pesquisar do topo -->

                    <!-- Inicio do item Logout do topo -->
                    <li class = "nav-item">
                        <a class="nav-link" href="index.php?logout=true">
                            <i class="fa fa-sign-out">Logout</i>
                        </a>
                    </li>
                    <!--Fim do item Logout do topo -->
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">

            <!--Inicio do corpo do site -->
            <div class="container-fluid">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Lista de Tarefas
                    </li>
                </ol>
                <?php include "./tarefas.php"; ?>
            </div>
            <!--Fim do corpo do site -->

            <!-- inicio do rodapé da pagina -->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright To-Do List 2018</small>
                    </div>
                </div>
            </footer>
            <!-- fim do rodapé da pagina -->
        </div>
        <script src="../../assets/bibliotecas/jquery/validaNovaTarefa.js"></script>
        <script src="../../assets/bibliotecas/jquery/validaEditarTarefa.js"></script>
        <script src="../../assets/bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../assets/bibliotecas/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <script src="../../assets/bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
        <script type="text/javascript" src="../../assets/js/sb-admin.js" ></script>
    </body>
</html>