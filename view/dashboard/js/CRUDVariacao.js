$(document).ready(function () {
    $("#alterarVariacao").hide();
    $("#idVariacao").hide();
});

function reload() {
    location.reload();
}

$("#submitVariacao").click(function (e) {
    e.preventDefault();
    validarForm("cadastro");
});

$("#alterarVariacao").click(function (e) {
    e.preventDefault();
    validarForm("");
});

$("#User_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    let dados = {
        idVariacao  : id,
        excluir     : 1
    };
    $.post('../../../control/CRUDVariacao/variacoes.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert("Variação deletada com sucesso!");
            reload();
        }else{
            alert("Ocorreu um erro ao deletar a variação");
        }
    });
});

$("#User_data").on('click', "#alterar", function () {

    $("#submitVariacao").hide();
    $("#alterarVariacao").show();
    $("#titulo").html("Editar Variação");

    const User = this.value;
    var id =    $("#User_row" + User + " .id_val").html();
    var nome =  $("#User_row" + User + " .nomeVariacao").html();
    var tipos = $("#User_row" + User + " .tiposVariacao").html();

    $("#idVariacao").val(id);
    $("#nomeVariacao").val(nome);
    $("#tiposVariacao").val(tipos);

    $('.scroll-to-top')[0].click();
});

function validarForm(acao){

    var nome = $("#nomeVariacao").val();

    if(nome === ""){
        alert("Informe um nome para a categoria");
        $("#nomeVariacao").focus();
    }else if(acao === "cadastro") {
        cadastrarVariacao();
    }else {
        alterarVariacao();
    }
}

function cadastrarVariacao(){
    let dados = {
        nomeVariacao        : $("#nomeVariacao").val(),
        tipoVariacao        : $("#tiposVariacao").val(),
        cadastro            : 1
    };

    $.post('../../../control/CRUDVariacao/variacoes.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Variação Cadastrada com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao cadastrar a variação');
        }
    });
}

function alterarVariacao() {
    let dados = {
        idVariacao          : $("#idVariacao").val(),
        nomeVariacao        : $("#nomeVariacao").val(),
        tipoVariacao        : $("#tiposVariacao").val(),
        alterar             : 1
    };

    $.post('../../../control/CRUDVariacao/variacoes.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Variação atualizada com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao atualizar a variação');
        }
    });
}
