$(document).ready(function () {
    $("#IDuser").hide();
    $("#alterarUser").hide();
});

function reload(){
    location.reload();
}

$("#submitCadUser").click(function (e) {
    e.preventDefault();
    let dados = {
        username    : $("#username").val(),
        usertype    : $("#admin_type").val(),
        useremail   : $("#useremail").val(),
        userkey     : $("#userkey").val(),
        cadastro    : 1
    };

    $.post("../../../control/CRUDuser/administradores.php",dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert("Usuário cadastrado com sucesso!");
            reload();

        }else{
            alert("Verifique os dados inseridos.");
            $("#name").val("");
            $("#email").val("");
        }
    });

});

$("#User_data").on('click', "#alterar", function () {
    $("#IDuser").show();
    $(".divSenha").hide();
    $("#submitCadUser").hide();
    $("#alterarUser").show();
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();
    var username = $("#User_row" + User + " .username_val").html();
    var admin_type = $("#User_row" + User + " .adm_val").html();
    var email = $("#User_row" + User + " .email_val").html();

    $("#userID").val(id);
    $("#username").val(username);
    $("#useremail").val(email);
    $("#admin_type").val(admin_type);

    $('.scroll-to-top')[0].click();
});


$("#User_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();

    $("#userID").val(id);

    let dados = {
        userID      : $("#userID").val(),
        excluir     : 1
    };

    $.post('../../../control/CRUDuser/administradores.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Usuário deletado com sucesso!');
            reload();
        }else{
            alert("Ocorreu um erro ao deletar o usuário :( ")
        }

    });

});


$("#alterarUser").click(function (e) {
    e.preventDefault();

    let dados = {
        userID      : $("#userID").val(),
        username    : $("#username").val(),
        usertype    : $("#admin_type").val(),
        useremail   : $("#useremail").val(),
        alterar     : 1
    };

    $.post('../../../control/CRUDuser/administradores.php',dados, function (retorno) {
        console.log(retorno);

        if(retorno === '1'){
            alert('Usuário alterado com sucesso!');
            reload();
        }else{
            alert("Ocorreu um erro ao alterar o usuário :( ")
        }
    });
});