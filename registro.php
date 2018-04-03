<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="css/sb-admin.min.css" >
        <title>Registro</title>
    </head>
    <body class ="bg-dark">
        <div class="container">
            <div class="card card-register mx-auto mt-5">
                <div class="card-header text-center">Criar uma Conta</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="nome">Nome Completo</label>
                                    <input type="text" name ="nome" id="nome" class="form-control" placeholder="Digite seu Nome">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefone">Celular</label>
                                    <input type="text" name ="telefone" id="telefone" class="form-control" placeholder="Digite seu Telefone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-10">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Nome da Rua">
                                </div>
                                <div class="col-md-2">
                                    <label for="numero">Numero</label>
                                    <input type="number" name ="numero" id="numero" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Digite Seu Email">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite Sua Senha">
                                </div>
                                <div class="col-md-6">
                                    <label for="confirmaSenha">Confirmar Senha</label>
                                    <input type="password" class="form-control" name="confirmaSenha" id="confirmaSenha" placeholder="Confirme Sua Senha">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrar-se</button>
                    </form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 text-center">
                                <a href="login.php" class="d-block small mt-3">Pagina de Login</a>
                            </div>
                            <div class="col-md-6 text-center" >
                                <a href="recuperar_senha.php" class="d-block small mt-3 ">Esqueceu a Senha?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="bibliotecas/jquery/jquery.min.js" ></script>
        <script src="bibliotecas/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <script src="bibliotecas/jquery-easing/jquery.easing.min.js" ></script>
        <script type="text/javascript" src="bibliotecas/jquery/jquery.maskedinput.min.js"></script>
        <script type="text/javascript">
            $(function(){
               $('#telefone').mask('(99) 99999 - 9999'); 
            });
        </script>
    </body>
</html>