function ValidarLogin(){

    var ret = true;
    var campos = "";
    // var email = document.getElementById("email").value;
    // var senha = $("#senha").val();

    if($("#email").val().trim()==""){
        campos = "Preencher o campo E-MAIL\n";
        ret = false;
    }
    if($("#senha").val().trim()==""){
        campos += "Preencher o campo SENHA";
        ret =false;
    }
    if(!ret){
        alert(campos);
    }

    return ret;33
}

function ValidarCadastro(){
    var ret = true;
    var campos ="";
    var senha = $("#senha").val();
    var n = senha.length;
    var pass = $("#senha").val();
    var pass2 =$("#rsenha").val();

    if($("#nome").val().trim()==""){
        campos = "Preencher o campo NOME\n";
        ret = false;
    }
    if($("#email").val().trim()==""){
        campos +="Preencher o campo E-MAIL\n";
        ret = false;
    }

    if($("#senha").val().trim()==""){
        campos +="Preencher o campo SENHA\n";
        ret = false;
    }
    else if(n < 6){
        campos ="O campo SENHA deverá ter no mínimo 6 caracteres";
        ret = false;
    }
    else if(pass != pass2){
        campos ="A senha e Repetir senha devem ser iguais!";
        ret = false;
    }

   
    if(!ret){
        alert(campos);
    }
    return ret;
}

function ValidarMeusDados(){
    var ret = true;
    var campos = "";

    if($("#nome").val().trim()==""){
        campos = "Preencher o campo NOME\n";
        ret = false;
    }
    if($("#email").val().trim()==""){
        campos += "Preencher o campo E-MAIL";
        ret = false;
    }

    if(!ret){
        alert(campos);
    }
    return ret;
}

function ValidarMovimento(){
    var ret = true;
    var campos = "";
    
    if($("#tipomovimento").val().trim()==""){
        campos = "Selecionar uma opção para o Tipo de Movimento\n";
        ret = false;
    }
    if($("#data").val().trim()==""){
        campos += "Escolher uma Data\n";
        ret = false;
    }
    if($("#categoria").val().trim()==""){
        campos += "Selecionar uma Categoria\n";
        ret = false;
    }
    if($("#empresa").val().trim()==""){
        campos +="Selecionar uma Empresa\n";
        ret = false;
    }
    if($("#conta").val().trim()==""){
        campos +="Selecionar uma Conta\n";
        ret = false;
    }
    if($("#valor").val().trim()==""){
        campos +="Preencher o Valor";
        ret = false;
    }
    if(!ret){
        alert (campos);
    }
    return ret;

    
}
function ValidarCategoria(){
    var ret = true;
    var campos = "";

    if($("#nome").val().trim()==""){
        campos = "Preencher o campo Nome da Categoria";
        ret = false;
    }
    if(!ret){
        alert (campos);
    }
    return ret;
}
function ValidarConta(){
    var ret = true;
    var campos = "";

    if($("#nome").val().trim()==""){
        campos = "Preencher o campo Nome do Banco\n";
        ret = false;
    }
    if($("#agencia").val().trim()==""){
        campos += "Preencher o campo Agência\n";
        ret = false;
    }
    if($("#conta").val().trim()==""){
        campos += "Preencher o campo Conta\n";
        ret = false;
    }
    if($("#saldo").val().trim()==""){
        campos +="Preencher o campo Saldo";
        ret = false;
    }
    if(!ret){
        alert (campos);

    }
    return ret;
}
function ValidarEmpresa(){
    var ret = true;
    var campos = "";

    if($("#nome").val().trim()==""){
        campos = "Preencher o campo Nome da Empresa\n";
        ret = false;
    }
    if($("#telefone").val().trim()==""){
        campos +="Preencher o campo Telefone\n";
        ret = false;
    }
    if($("#endereco").val().trim()==""){
        campos += "Preencher o campo Endereço";
        ret = false;
    }
    if(!ret){
        alert (campos);
    }
    return ret;
}