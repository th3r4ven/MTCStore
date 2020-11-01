$(document).ready(function () {
    $(".alterar_senha").hide();
    $("#nao_alterar_senha").hide();
});

function reload(){
    location.reload();
}

$("#userkeyconfirm").focusout(function () {
    var key = $("#userkey");
    var confirmkey = $("#userkeyconfirm");

    if(key.val() === confirmkey.val()){
        key.addClass("btn-outline-success");
        confirmkey.addClass("btn-outline-success");
        key.removeClass("btn-outline-danger");
        confirmkey.removeClass("btn-outline-danger");
    }else {
        alert("As senhas inseridas não são iguais.");
        confirmkey.val("");
        key.removeClass("btn-outline-success");
        confirmkey.removeClass("btn-outline-success");
        key.addClass("btn-outline-danger");
        confirmkey.addClass("btn-outline-danger");
    }
});

$("#alterarUser").click(function (e) {
    e.preventDefault();
    var key = $("#userkey");
    var confirmkey = $("#userkeyconfirm");

    if(key.val() !== ""){
        if(key.val() === confirmkey.val()){
            let dados = {
                userID          : $("#userID").val(),
                userkey         : key.val(),
                alterarSenha    : 1
            };

            $.post('../../../control/CRUDuser/administradores.php', dados,function (retorno) {
                console.log(retorno);

                if(retorno === '1'){
                    alert('Senha alterada com sucesso!');
                    reload();
                }else{
                    alert("Ocorreu um erro ao alterar a senha :( ")
                }

            });
        }else {
            alert("As senhas não são iguais!");
        }
    }else {
        let dados = {
            userID      : $("#userID").val(),
            username    : $("#username").val(),
            useremail   : $("#useremail").val(),
            profile     : 1,
            alterar     : 1,
        };
        $.post('../../../control/CRUDuser/administradores.php', dados,function (retorno) {
            console.log(retorno);
            if(retorno === '1'){
                alert('Usuário alterado com sucesso!');
                reload();
            }else{
                alert("Ocorreu um erro ao alterar o usuário :( ")
            }
        });
    }

});

$("#alterar_senha").click(function (e) {
    e.preventDefault();

    $(".alterar_senha").show();
    $("#nao_alterar_senha").show();
    $("#alterar_senha").hide();

});

$("#nao_alterar_senha").click(function (e) {
    e.preventDefault();
    $("#userkey").val("");
    $("#userkeyconfirm").val("");

    $("#userkey").removeClass("btn-outline-success");
    $("#userkeyconfirm").removeClass("btn-outline-success");

    $("#userkey").removeClass("btn-outline-danger");
    $("#userkeyconfirm").removeClass("btn-outline-danger");

    $(".alterar_senha").hide();
    $("#nao_alterar_senha").hide();
    $("#alterar_senha").show();
});