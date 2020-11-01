$(document).ready(function () {
    $("#alterarCategoria").hide();
    $("#IDCategoria").hide();
});

function reload() {
    location.reload();
}

$("#submitCategoria").click(function (e) {
    e.preventDefault();
    validarForm("cadastro");
});

$("#alterarCategoria").click(function (e) {
    e.preventDefault();
    validarForm("");
});

$("#User_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    let dados = {
        idCategoria : id,
        excluir : 1
    };
    $.post('../../../control/CRUDCategoria/categorias.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert("Categoria deletada com sucesso!");
            reload();
        }else{
            alert("Ocorreu um erro ao deletar a categoria");
        }
    });
});

$("#User_data").on('click', "#alterar", function () {

    $("#submitCategoria").hide();
    $("#alterarCategoria").show();
    $("#titulo").html("Editar Categoria");

    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    var descricao = $("#User_row" + User + " .descCategoria").html();

    $("#IDCategoria").val(id);
    $("#descCategoria").val(descricao);

    $('.scroll-to-top')[0].click();
});

function validarForm(acao){

    var descricao = $("#descCategoria").val();

    if(descricao === ""){
        alert("Informe um nome para a categoria");
        $("#descCategoria").focus();
    }else if(acao === "cadastro") {
        cadastrarCategoria();
    }else {
        alterarCategoria();
    }
}

function cadastrarCategoria(){
    let dados = {
        descCategoria       : $("#descCategoria").val(),
        cadastro            : 1
    };

    $.post('../../../control/CRUDCategoria/categorias.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Categoria Cadastrada com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao cadastrar a categoria');
        }
    });
}

function alterarCategoria() {
    let dados = {
        idCategoria         : $("#IDCategoria").val(),
        descCategoria       : $("#descCategoria").val(),
        alterar             : 1
    };

    $.post('../../../control/CRUDCategoria/categorias.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Categoria atualizada com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao atualizar a categoria');
        }
    });
}
