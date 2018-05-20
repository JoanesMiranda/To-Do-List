<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/bibliotecas/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/sb-admin.min.css" >
        <link rel="stylesheet" type="text/css"  href="../../assets/css/estilos.css" >
        <title>Registro</title>
    </head>
    <body class ="bg-dark">
        <div class="container">
            <div class="card card-register mx-auto mt-5">
                <div class="card-header text-center badge-info">Criar uma Conta</div>
                <div class="card-body">
                    <form method="POST" action="../controllers/UsuarioController.php" name="formRegistro" id="formRegistro">
                        <input type="hidden" name="action" value="salvar">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="nome">Nome Completo *</label>
                                    <input type="text" name ="nome" id="nome" class="form-control" placeholder="Digite seu Nome">
                                    <span class='msg-erro msg-nome'></span>
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
                            <label for="email">Email *</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Digite Seu Email">
                            <span class='msg-erro msg-email'></span>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="senha">Senha *</label>
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite Sua Senha">
                                    <span class='msg-erro msg-senha'></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="senha2">Confirmar Senha *</label>
                                    <input type="password" class="form-control" name="senha2" id="senha2" placeholder="Confirme Sua Senha">
                                    <span class='msg-erro msg-senha2'></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Registrar-se</button>
                    </form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6 text-center">
                                <a href="login.php" class="d-block small mt-3">Pagina de Login</a>
                            </div>
                            <div class="col-md-6 text-center" >
                                <a href="recuperar.php" class="d-block small mt-3 ">Esqueceu a Senha?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../assets/bibliotecas/jquery/validaRegistro.js"></script>
        <script src="../../assets/bibliotecas/jquery/jquery.min.js"></script>
        <script src="../../assets/bibliotecas/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/bibliotecas/jquery-easing/jquery.easing.min.js"></script>
        <script type="text/javascript" src="../../assets/bibliotecas/jquery/jquery.maskedinput.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#telefone').mask('(99) 99999 - 9999');
            });
        </script>
    </body>
</html>