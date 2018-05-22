<?php

require '../../bootstrap.php';

use App\Models\LoginDAO;

$loginDAO = new LoginDAO();


if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $action = filter_input(INPUT_POST, 'action');

    if ($action == "login") {

        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $loginDAO->login($email, $senha . $email);
    } else if ($action == "email") {

        //recebe email
        $email = filter_input(INPUT_POST, 'email');

        //verificar email valido no BD
        if (!$loginDAO->validaEmail($email)) {
            echo "<script> alert('Email não cadastrado no sistema'); </script> ";
            echo "<script> document.location = '../views/recuperar.php'; </script> ";
        } else {

            $nova_senha = substr(md5(time()), 0, 6);
            $senha_protegida = md5(md5($nova_senha));
            $loginDAO->recuperarSenha($senha_protegida, $email);

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'meuemail';
                $mail->Password = 'minhasenha';
                $mail->SMTPSecure = 'TLS';
                $mail->Port = 587;
                //Recipients
                $mail->setFrom('meuemail', 'Mailer');
                $mail->addAddress($email, 'Padrão');

                $mail->isHTML(true);
                $mail->Subject = 'email de recuperação';
                $mail->Body = 'esse é uma email de recuperação de sua senha</b>';
                $mail->AltBody = 'esse é uma email de recuperação de sua senha';

                $mail->send();
                echo 'Email enviado';
            } catch (Exception $e) {
                echo 'erro ao enviar o email: ', $mail->ErrorInfo;
            }
        }
    }
}

class LoginController {
    
}
