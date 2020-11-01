$("#alterarCliente").click(function (e) {
    e.preventDefault();

    let dados = {
        clienteID       : $("#id_cliente").val(),
        firstName       : $("#firstName").val(),
        lastName        : $("#lastName").val(),
        emailCliente    : $("#emailCliente").val(),
        cpfCliente      : $("#cpfCliente").val(),
        birthCliente    : $("#birthCliente").val(),
        phoneCliente    : $("#phoneCliente").val(),
        CEPCliente      : $("#CEPCliente").val(),
        enderecoCliente : $("#enderecoCliente").val(),
        numeroCliente   : $("#numeroCliente").val(),
        estadoCliente   : $("#estadoCliente").val(),
        bairroCliente   : $("#bairroCliente").val(),
        cidadeCliente   : $("#cidadeCliente").val(),
        alterar         : 1
    };

    $.post('../../../control/CRUDCliente/clientes.php',dados, function (retorno) {
        console.log(retorno);

        if(retorno === '1'){
            alert('Cliente alterado com sucesso!');
            window.location.href= "http://localhost/site/view/dashboard/usuarios/clientes.php";
        }else{
            alert("Ocorreu um erro ao alterar os dados do cliente :( ");
        }
    });

});

$("#gerar_nova_senha").click(function (e) {
    e.preventDefault();

    let dados = {
        clienteID       : $("#id_cliente").val(),
        emailCliente    : $("#emailCliente").val(),
        alterarSenha    : 1
    };

    $.post('../../../control/CRUDCliente/clientes.php', dados, function (retorno) {
        console.log(retorno);

        if (retorno === '0'){
            alert("Erro ao alterar a senha do cliente");
        }else{
            alert("Nova senha alterada com sucesso e enviada ao email do cliente.\n A nova senha é: " + retorno);
        }
    });

});

$("#Cliente_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id").html();

    let dados = {
        clienteID : id,
        excluir   : 1
    };

    $.post('../../../control/CRUDCliente/clientes.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert('Usuário deletado com sucesso!');
            reload();
        }else{
            alert("Ocorreu um erro ao deletar o usuário :( ")
        }

    });

});

function reload() {
    location.reload();
}



