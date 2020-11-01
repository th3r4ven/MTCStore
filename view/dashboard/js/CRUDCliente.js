/**
 $(function () {
    //Executa quando o campo cpf perde o foco...

    $('#cpfCliente').blur(function () {
        var cpf = $('#cpfCliente').val().replace(/[^0-9]/g,'').toString();

        if(cpf.length == 11){
            var v = [];

            //calcula o primeiro digito de verificação
            v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[0] = v[0] % 11;
            v[0] = v[0] % 10;

            //calcula segundo digito
            v[1] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
            v[1] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
            v[1] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
            v[1] = v[1] % 11;
            v[1] = v[1] % 10;

            //retorna true se tiver incorreto
            if( (v[0] != cpf[9]) || (v[1] != cpf[10])){

                alert('CPF inválido: ' + cpf);

                $('#cpfCliente').val('');
                $('#cpfCliente').focus();
            }else {formatar('###.###.###-##'), $('#cpfCliente').val();}

        }else {
            alert('CPF inválido: ' + cpf);

            $('#cpfCliente').val('');
            $('#cpfCliente').focus();
        }




    });

});
 */

$(document).ready(function() {

    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#enderecoCliente").val("");
        $("#bairroCliente").val("");
        $("#cidadeCliente").val("");
        $("#estadoCliente").val("");

    }

    //Quando o campo cep perde o foco.
    $("#CEPCliente").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#enderecoCliente").val("...");
                $("#bairroCliente").val("...");
                $("#cidadeCliente").val("...");
                $("#estadoCliente").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#enderecoCliente").val(dados.logradouro);
                        $("#bairroCliente").val(dados.bairro);
                        $("#cidadeCliente").val(dados.localidade);
                        $("#estadoCliente").val(dados.uf);



                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    });
});

$("#submitCliente").click(function (e) {
    e.preventDefault();

    let dados = {
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
        cadastro        : 1
    };

    $.post('../../../control/CRUDCliente/clientes.php',dados, function (retorno) {
        console.log(retorno);

        if(retorno === '1'){
            alert('Cliente cadastrado com sucesso!');
           reload();
        }else{
            alert("Ocorreu um erro ao cadastrar o cliente :( ");
        }
    });
});

function reload(){
    location.reload();
}