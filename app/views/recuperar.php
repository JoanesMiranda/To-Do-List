<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/sb-admin.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/estilos.css" >
        <title>Recuperar Senha</title>
    </head>
    <body class ="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center badge-info">Recuperar Senha</div>
                <div class="card-body">
                    <div class="text-center mt-4 mb-5">
                        <p>
                        <h4>Esqueceu sua Senha ?</h4>
                        Digite seu email e nós enviaremos instruções sobre como redefinir sua senha.
                        </p>
                    </div>
                    <form method="POST" action="" name="formRecuperar" id="formRecuperar">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite Seu Email">
                            <span class='msg-erro msg-email'></span>
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Recuperar Senha</button>
                    </form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 text-center">
                                <a href="registro.php" class="d-block small mt-3">Criar uma Conta</a>
                            </div>
                            <div class="col-md-6 text-center" >
                                <a href="login.php" class="d-block small mt-3 ">Pagina de Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../assets/bibliotecas/jquery/validaRecuperar.js" ></script>
        <script src="../../assets/bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../assets/bibliotecas/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <script src="../../assets/bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
    </body>
</html>