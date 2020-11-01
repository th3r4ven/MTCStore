$(document).ready(function () {
    $("#alterarSubCategoria").hide();
    $("#idformSubCategoria").hide();
});

function reload() {
    location.reload();
}

$("#submitSubCategoria").click(function (e) {
    e.preventDefault();
    validarForm("cadastro");
});

$("#alterarSubCategoria").click(function (e) {
    e.preventDefault();
    validarForm("");
});

$("#User_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    let dados = {
        idSubCategoria : id,
        excluir : 1
    };
    $.post('../../../control/CRUDSubCategoria/subcategorias.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert("Sub-categoria deletada com sucesso!");
            reload();
        }else{
            alert("Ocorreu um erro ao deletar a Sub-categoria");
        }
    });
});

$("#User_data").on('click', "#alterar", function () {

    $("#submitSubCategoria").hide();
    $("#alterarSubCategoria").show();
    $("#titulo").html("Editar Sub-Categoria");

    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    var descricao = $("#User_row" + User + " .descricaoSubCategoria").html();
    var categoria_pai = $("#User_row" + User +  " .descricaoCategoriatable").html();

    $("#idSubCategoria").val(id);
    $("#nomeSubCategoria").val(descricao);
    $("#descricaoCategoria").val(categoria_pai);

    $('.scroll-to-top')[0].click();
});

function validarForm(acao){

    var descricao = $("#nomeSubCategoria").val();
    var categoria_pai = $("#descricaoCategoria").val();

    if(descricao === ""){
        alert("Informe um nome para a categoria");
        $("#descCategoria").focus();
    }else if(categoria_pai === null){
        alert("Para cadastrar uma sub-categoria você deve informar qual categoria ela pertence.")
    }else if(acao === "cadastro") {
        cadastrarSubCategoria();
    }else {
        alterarSubCategoria();
    }
}

function cadastrarSubCategoria(){
    let dados = {
        descricaoSubCategoria   : $("#nomeSubCategoria").val(),
        descricaoCategoria      : $("#descricaoCategoria").val(),
        cadastro                : 1
    };

    $.post('../../../control/CRUDSubCategoria/subcategorias.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Sub-categoria Cadastrada com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao cadastrar a sub-categoria');
        }
    });
}

function alterarSubCategoria() {
    let dados = {
        idSubCategoria          : $("#idSubCategoria").val(),
        descricaoSubCategoria   : $("#nomeSubCategoria").val(),
        descricaoCategoria      : $("#descricaoCategoria").val(),
        alterar             : 1
    };

    $.post('../../../control/CRUDSubCategoria/subcategorias.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Sub-categoria atualizada com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao atualizar a sub-categoria');
        }
    });
}
