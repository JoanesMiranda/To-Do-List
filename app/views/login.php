<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../css/sb-admin.min.css" >
        <title>Login</title>      
        <style type="text/css">.msg-erro{ color: red; font-size:12px } </style>
    </head>
    <body class ="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center badge-info">Login To-Do List</div>
                <div class="card-body">
                    <form method="POST" action="login.php" name="formLogin" id="formLogin">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Digite Seu Email">
                            <span class='msg-erro msg-email'></span>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite Sua Senha">
                            <span class='msg-erro msg-senha'></span>
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Entrar</button>
                    </form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 text-center">
                                <a href="registro.php" class="d-block small mt-3">Criar uma Conta</a>
                            </div>
                            <div class="col-md-6 text-center" >
                                <a href="recuperar.php" class="d-block small mt-3" >Esqueceu a Senha?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../../bibliotecas/jquery/validaLogin.js"></script>
        <script src="../../bibliotecas/jquery/jquery.min.js" ></script>
        <script src="../../bibliotecas/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <script src="../../bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
    </body>
</html>