<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../css/sb-admin.min.css" >
        <title>Principal</title>
    </head>

    <body class="bg-dark fixed-nav sticky-footer" id="pageTop">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="">Nome do Usuario</a>
            <button class="navbar-toggler navbar-toggler-rigth" type="button" data-toggle="collapse" data-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarPrincipal">
                <ul class="navbar-nav navbar-sidenav">
                    <li class="nav-item" data-togle="tooltip" data-placement = "rigth">
                        <a class="nav-link" href="index.php?tarefas">
                            <i class="fa fa-fw fa-clipboard"> </i>
                            <span class="nav-link-text">Lista de Tarefas</span>
                        </a>
                    </li>
                    <li class="nav-item" data-togle="tooltip" data-placement = "rigth">
                        <a class="nav-link nav-link-collapse collapse" href="#linksPaginas" data-toggle="collapse">
                            <i class="fa fa-fw fa-file"> </i>
                            <span class="nav-link-text">Paginas</span>
                        </a>
                        <ul class="sidenav-second-level collapse"id="linksPaginas">
                            <li>
                                <a href="index.php?login">Pagina de Login</a>
                            </li>
                            <li>
                                <a href="index.php?recuperar">Pagina Recuperar</a>
                            </li>
                            <li>
                                <a href="index.php?registro">Pagina de Registro</a>
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
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pesquisar por...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                    <!-- Fim do item pesquisar do topo -->

                    <!-- Inicio do item Logout do topo -->
                    <li class = "nav-item">
                        <a class="nav-link "href="">
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
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <?php echo $pagina = "pagina em "; ?>
                    </li>
                </ol>
                <?php
                if (isset($_REQUEST["login"])) {
                    include "./login.php";
                } elseif (isset($_REQUEST["registro"])) {
                    include "./registro.php";
                } elseif (isset($_REQUEST["recuperar"])) {
                    include "./recuperar.php";
                }
                ?>

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
        <script src="../../bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../bibliotecas/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <script src="../../bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
        <script type="text/javascript" src="../../js/sb-admin.js" ></script>
    </body>
</html>