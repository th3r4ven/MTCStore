$(document).ready(function () {
   $("#alterarCupons").hide();
});

function reload() {
    location.reload();
}

$("#submitCupons").click(function (e) {
    e.preventDefault();
    validarForm("cadastro");
});

$("#alterarCupons").click(function (e) {
    e.preventDefault();
    validarForm("");
});

$("#User_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    $("#CuponID").val(id);
    let dados = {
        CuponID : $("#CuponID").val(),
        excluir : 1
    };
    $.post('../../../control/CRUDCupons/cupons.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert("Cupon deletado com sucesso!");
            reload();
        }else{
            alert("Ocorreu um erro ao deletar o cupon");
        }
    });
});

$("#User_data").on('click', "#alterar", function () {

    $("#submitCupons").hide();
    $("#alterarCupons").show();

    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    var cupon_code = $("#User_row" + User + " .cuponCode_val").html();
    var desconto = $("#User_row" + User + " .porcentagemDesconto_val").html();
    desconto = desconto.split('%');

    $("#CuponID").val(id);
    $("#CuponDescription").val(cupon_code);
    $("#CuponDiscount").val(desconto[0]);

    $('.scroll-to-top')[0].click();
});

function validarForm(acao){

    var codigoCupon = $("#CuponDescription").val();
    var numero = $("#CuponDiscount").val();

    if(codigoCupon === ""){
        alert("Informe o codigo do cupon");
        $("#CuponDescription").focus();
    }else if(numero === ""){
        alert("Informe o valor de desconto do cupon");
        $("#CuponDiscount").focus();
    }else if(acao === "cadastro") {
        cadastrarCupon();
    }else {
        alterarCupon();
    }
}

function cadastrarCupon(){
    let dados = {
        codigoCupon         : $("#CuponDescription").val(),
        porcentagemCupon    : $("#CuponDiscount").val(),
        cadastro            : 1
    };

    $.post('../../../control/CRUDCupons/cupons.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Cupon Cadastrado com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao cadastrar o cupon');
        }
    });
}

function alterarCupon() {
    let dados = {
        CuponID             : $("#CuponID").val(),
        codigoCupon         : $("#CuponDescription").val(),
        porcentagemCupon    : $("#CuponDiscount").val(),
        alterar             : 1
    };

    $.post('../../../control/CRUDCupons/cupons.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Cupon atualizado com sucesso!');
            reload();
        }else{
            alert('Ocorreu um erro ao atualizar o cupon');
        }
    });
}


