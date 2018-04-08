
function validaUsuario()
{
    if(document.formUsuario.nome.value === "")
    {
        alert("Por favor, preencha o campo nome");
        document.formUsuario.nome.focus();
        return false;
    }
    if(document.formUsuario.sobreNome.value === "")
    {
        alert("Por favor, preencha o campo sobre nome");
        
        document.formUsuario.sobreNome.focus();
        return false;
    }
    var email = document.formUsuario.email.value;
    if(document.formUsuario.email.value === "" || document.formUsuario.email.value.indexOf('@') === -1 
            || document.formUsuario.email.value.indexOf('.') === -1)
    {
        alert("Por favor, digite um endereço de e-mail valido");
        document.formUsuario.email.focus();
        return false;   
    }
    var confEmail = document.formUsuario.confEmail.value;
    if(document.formUsuario.email.value === "" || document.formUsuario.email.value.indexOf('@') === -1 
            || document.formUsuario.email.value.indexOf('.') === -1)
    {
        alert("Por favor, digite um endereço de e-mail valido");
        document.formUsuario.email.focus();
        return false;   
    }
    
    if(email !== confEmail)
    {
        alert("Emails Diferentes");
        document.formUsuario.email.focus();
        return false; 
    }
    
    if(document.formUsuario.senha.value === "" || document.formUsuario.senha.value.length < 8)
    {
        alert("Por Favor, preencha o campo senha(minimo 8 caracteres)");
        document.formUsuario.senha.focus();
        return false;
    }
   
    if(document.formUsuario.confSenha.value === "" || document.formUsuario.confSenha.value.length < 8)
    {
        alert("Por Favor, preencha o campo senha(minimo 8 caracteres)");
        document.formUsuario.confSenha.focus();
        return false;
    }
    if(document.formUsuario.senha.value !== document.formUsuario.confSenha.value)
    {
        alert("senhas diferentes");
        document.formUsuario.senha.focus();
        return false;
    }
    if(document.formUsuario.confSenha.value !== document.formUsuario.senha.value)
    {
        alert("senhas diferentes");
        document.formUsuario.confSenha.focus();
        return false;
    }
}
