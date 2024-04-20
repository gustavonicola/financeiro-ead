function ValidarMeusDados() {
    
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo nome!");
        $("#nome").focus();
        $("#divNome").addClass("has-error");
        return false;
    }

    if ($("#email").val().trim() == '') {
        $("#divNome").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo e-mail!");
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        return false;
    }

    if ($("#senha").val().trim() == '') {
        $("#divEmail").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo senha!");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    }

    if ($("#senha").val().length < 6) {        
        alert("A senha deverá conter no mínimo 6 caracteres!");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    }

}


function ValidarCategoria() {
    
    if ($("#nomecategoria").val().trim() == '') {
        alert("Preencher o campo nome da categoria!");
        $("#nomecategoria").focus();
        $("#divNomeCategoria").addClass("has-error");
        return false;
    }
}


function ValidarEmpresa() {
    
    if ($("#nomeempresa").val().trim() == '') {
        alert("Preencher o campo nome da empresa!");
        $("#nomeempresa").focus();
        $("#divNomeEmpresa").addClass("has-error");
        return false;
    }    
}

function ValidarConta() {

    
    if ($("#banco").val().trim() == '') {
        alert("Preencher o campo nome do banco!");
        $("#banco").focus();
        $("#divBanco").addClass("has-error");
        return false;
    } 

    if ($("#agencia").val().trim() == '') {
        $("#divBanco").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo agência!");
        $("#agencia").focus();
        $("#divAgencia").addClass("has-error");
        return false;
    } 

    if ($("#numero").val().trim() == '') {
        $("#divAgencia").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo número da conta!");
        $("#numero").focus();
        $("#divNumero").addClass("has-error");
        return false;
    } 

    if ($("#saldo").val().trim() == '') {
        $("#divNumero").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo saldo!");
        $("#saldo").focus();
        $("#divSaldo").addClass("has-error");
        return false;
    }
    
}

function ValidarMovimento(){

    if ($("#tipo").val() == '') {        
        alert("Selecione o tipo de lançamento!");
        $("#tipo").focus();
        $("#divTipo").addClass("has-error");
        return false;
    }

    if ($("#data").val().trim() == '') {
        $("#divTipo").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo data!");
        $("#data").focus();
        $("#divData").addClass("has-error");
        return false;
    }

    if ($("#valor").val().trim() == '') {
        $("#divData").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo valor!");
        $("#valor").focus();
        $("#divValor").addClass("has-error");
        return false;
    }

    if ($("#categoria").val() == '') {
        $("#divData").removeClass("has-error").addClass("has-success");
        alert("Selecione a categoria!");
        $("#categoria").focus();
        $("#divCategoria").addClass("has-error");
        return false;
    }

    if ($("#empresa").val() == '') {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
        alert("Selecione a empresa!");
        $("#empresa").focus();
        $("#divEmpresa").addClass("has-error");
        return false;
    }

    if ($("#conta").val() == '') {
        $("#divEmpresa").removeClass("has-error").addClass("has-success");
        alert("Selecione a conta!");
        $("#conta").focus();
        $("#divConta").addClass("has-error");
        return false;
    }

}


function ValidarConsultaPeriodo(){
    
    if ($("#data_inicial").val().trim() == '') {        
        alert("Digite a data incial!");
        $("#data_inicial").focus();
        $("#divInicial").addClass("has-error");
        return false;
    }

    if ($("#data_final").val().trim() == '') {
        $("#divInicial").removeClass("has-error").addClass("has-success");
        alert("Digite a data final!");
        $("#data_final").focus();
        $("#divFinal").addClass("has-error");
        return false;
    }
}

function ValidarConsultaPorCategoria(){
    
    if ($("#categoria").val() == '') {        
        alert("Selecione a categoria desejada!");
        $("#categoria").focus();
        $("#divCategoria").addClass("has-error");
        return false;
    }
    
    if ($("#data_inicial").val().trim() == '') {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
        alert("Digite a data incial!");
        $("#data_inicial").focus();
        $("#divInicial").addClass("has-error");
        return false;
    }

    if ($("#data_final").val().trim() == '') {
        $("#divInicial").removeClass("has-error").addClass("has-success");
        alert("Digite a data final!");
        $("#data_final").focus();
        $("#divFinal").addClass("has-error");
        return false;
    }
}

function ValidarConsultaPorConta(){
    
    if ($("#conta").val() == '') {        
        alert("Selecione a conta desejada!");
        $("#conta").focus();
        $("#divConta").addClass("has-error");
        return false;
    }    
}

function ValidarLogin(){

    if ($("#email").val().trim() == '') {        
        alert("Digite o seu e-mail!");
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        return false;
    }

    if ($("#senha").val().trim() == '') {
        $("#divSenha").removeClass("has-error").addClass("has-success");
        alert("Digite a sua senha!");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    }
    
}

function ValidarCadastro(){
    
    if ($("#nome").val().trim() == '') {        
        alert("Prencher o campo nome!");
        $("#nome").focus();
        $("#divNome").addClass("has-error");
        return false;
    }

    if ($("#email").val().trim() == '') {
        $("#divNome").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo e-mail!");
        $("#email").focus();
        $("#divEmail").addClass("has-error");
        return false;
    }

    if ($("#senha").val().trim() == '') {
        $("#divEmail").removeClass("has-error").addClass("has-success");
        alert("Preencher o campo senha!");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    }

    if ($("#senha").val().length < 6) {        
        alert("A senha deverá conter no mínimo 6 caracteres!");
        $("#senha").focus();
        $("#divSenha").addClass("has-error");
        return false;
    }

    if ($("#senha").val().trim() != $("#rsenha").val().trim()) {        
        alert("O campo senha e repetir senha deverão ser iguais!");
        $("#rsenha").focus();
        $("#divRSenha").addClass("has-error");
        return false;
    }


}