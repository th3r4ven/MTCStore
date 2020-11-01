var imagem;
$(document).ready(function () {

    if($("#idProduto").val() != null){
        $(".imagens").hide();
        $("#cancelarNovaImagem").hide();
    }

    $("#cancelarNovaImagem").click(function (e) {
        e.preventDefault();
        $("#imagensDosProdutos").show();
        $("#novaImagem").show();
        imagem = false;
        $(".imagens").hide();
        $("#cancelarNovaImagem").hide();
    });

    $("#novaImagem").click(function (e) {
        e.preventDefault();
        $("#imagensDosProdutos").hide();
        $("#novaImagem").hide();
        imagem = true;
        $(".imagens").show();
        $("#cancelarNovaImagem").show();
    });

});

function reload() {
    location.reload();
}

function validarForm(acao){

    var titulo          = $("#tituloProd").val();
    var descricaoBreve  = $("#descricaoBreve").val();
    var descricao       = $("#descricao").val();
    var preco           = $("#preco").val();
    var precoPromo      = $("#precoPromo").val();
    var estoque         = $("#estoque").val();
    var SKU_EAN         = $("#SKUEAN").val();
    var marca           = $("#marca").val();
    var altura          = $("#altura").val();
    var comprimento     = $("#comprimento").val();
    var largura         = $("#largura").val();
    var peso            = $("#peso").val();
    var variacao        = $("#variacao").val();
    var categoria       = $("#categoria").val();
    var subCategoria    = $("#subcategoria").val();
    var fotoPrincipal   = $("#fotoPrincipal").val();

    if(titulo === ""){
        alert("Informe o titulo do produto");
        $("#tituloProd").focus();
    }else if(descricao === ""){
        alert("O produto deve conter uma descrição");
        $("#descricao").focus();
    }else if(descricaoBreve === ""){
        alert("O produto deve ter uma descrição breve.");
        $("#descricaoBreve").focus();
    }else if(preco === "" && preco <=0 && $("#centavos").val() <=0 && $("#centavos").val() > 99) {
        alert("Informe um preço válido para o produto");
        $("#preco").focus();
    }else if(precoPromo >= preco && precoPromo <=0 && $("#centavosPromo").val() <=0 && $("#centavosPromo").val() > 99){
        alert("Informe um preço promocional valido");
        $("#preprecoPromo").focus();
    }else if(estoque <= 0){
        alert("O produto deve ter um estoque para ser alterado");
        $("#estoque").focus();
    }else if(altura === ""){
        alert("O produto deve ter uma altura para ser alterado");
        $("#altura").focus();
    }else if(comprimento === ""){
        alert("O produto deve ter um comprimento para ser alterado");
        $("#comprimento").focus();
    }else if(largura === ""){
        alert("O produto deve ter uma largura para ser alterado");
        $("#largura").focus();
    }else if(peso === ""){
        alert("O produto deve ter um peso para ser alterado");
        $("#peso").focus();
    }else if(SKU_EAN === ""){
        alert("O produto deve ter um codigo SKU ou EAN para ser alterado");
        $("#SKUEAN").focus();
    }else if(marca === ""){
        alert("O produto deve ter uma marca definda para ser alterado");
        $("#marca").focus();
    }else if(variacao === ""){
        alert("Insira uma variacao válida para o produto");
        $("#variacao").focus();
    }else if(categoria === ""){
        alert("Insira uma categoria válida para o produto");
        $("#categoria").focus();
    }else if(subCategoria === ""){
        alert("Insira uma Sub-categoria válida para o produto");
        $("#subcategoria").focus();
    }else if(imagem === true && fotoPrincipal === ""){
        alert("O produto deve ter uma foto principal para ser alterado");
        $("#fotoPrincipal").focus();
    }else if(acao === "cadastro"){
        cadastrarProduto();
    }else if(acao === ""){
        alterarProduto();
    }
}

$("#submitProduto").click( function (e) {
    e.preventDefault();
    validarForm("cadastro");
});

$("#alterarProduto").click( function (e) {
    e.preventDefault();
    validarForm("");
});

function cadastrarProduto(){

    var cupon;
    var frete;
    var destaque;
    if ($("#cupon").prop("checked") === true) {cupon = 1;}
    else if ($("#cupon").prop("checked") === false) {cupon = 0;}
    if ($("#frete").prop("checked") === true) {frete = 1;}
    else if ($("#frete").prop("checked") === false) {frete = 0;}
    if ($("#destaque").prop("checked") === true) {destaque = 1;}
    else if ($("#destaque").prop("checked") === false) {destaque = 0;}
    var dados = new FormData();

    dados.append('tituloProd', $("#tituloProd").val());
    dados.append('descricaoBreve', $("#descricaoBreve").val());
    dados.append('descricaoProd', $("#descricao").val());
    dados.append('precoProd', $("#preco").val() + "." + $("#centavos").val());
    dados.append('precoPromoProd', $("#precoPromo").val() +"." + $("#centavosPromo").val());
    dados.append('estoqueProd', $("#estoque").val());
    dados.append('cuponProd', cupon);
    dados.append('destaque', destaque);
    dados.append('sku_ean', $("#SKUEAN").val());
    dados.append('marcaProd', $("#marca").val());
    dados.append('medidas', $("#altura").val() + ';' + $("#comprimento").val() + ';' + $("#largura").val() + ';' + $("#peso").val());
    dados.append('foto1', $("#fotoPrincipal")[0].files[0]);
    if($("#foto2").val() != null){dados.append('foto2', $("#foto2")[0].files[0]);}
    if($("#foto3").val() != null){dados.append('foto3', $("#foto3")[0].files[0]);}
    if($("#foto4").val() != null){dados.append('foto4', $("#foto4")[0].files[0]);}
    dados.append('entrega', frete);
    dados.append('VariacaoProd', $("#variacao").val());
    dados.append('CategoriaProd', $("#categoria").val());
    dados.append('SubCategoriaProd', $("#subcategoria").val());
    dados.append('cadastro', '1');

    $.ajax({
        url: "../../../control/CRUDProduto/produtos.php",
        data: dados,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (retorno) {

            console.log(retorno);

            if (retorno === '1'){
                alert("Produto cadastrado com sucesso!");
                window.location.href = 'http://localhost/site/view/dashboard/produto/produto.php';
            }else {
                alert("Ocorreu um  erro ao cadastrar o produto");
            }
        }
    });

    /*let dados = {
        tituloProd          : $("#titulo").val(),
        descricaoProd       : $("#descricao").val(),
        precoProd           : $("#preco").val(),
        precoPromoProd      : $("#precoPromo").val(),
        estoqueProd         : $("#estoque").val(),
        cuponProd           : cupon,
        sku_ean             : $("#SKUEAN").val(),
        marcaProd           : $("#marca").val(),
        imagensProd         : $("#fotoPrincipal")[0].files[0] + ";" + $("#foto2")[0].files[0] + ";" + $("#foto3")[0].files[0] + ";" + $("#foto4")[0].files[0],
        entrega             : frete,
        VariacaoProd        : $("#variacao").val(),
        CategoriaProd       : $("#categoria").val(),
        SubCategoriaProd    : $("#subcategoria").val(),
        cadastro            : 1
    };*/
    /*
    $.post('../../../control/CRUDProduto/produtos.php', dados, function (retorno) {

        console.log(retorno);

        if (retorno === '1'){
            alert("Produto cadastrado com sucesso!");
            reload();
        }else {
            alert("Ocorreu um  erro ao cadastrar o produto");
        }

    });*/

}

function alterarProduto(){

    var dados = new FormData();
    if(imagem === true){

        dados.append('newImagens', imagem);
        dados.append('alterar', '1');
        dados.append('idProduto', $("#idProduto").val());
        dados.append('oldImagem', $("#imagensDoProduto").val());
        dados.append('foto1', $("#fotoPrincipal")[0].files[0]);
        if($("#foto2").val() != null){dados.append('foto2', $("#foto2")[0].files[0]);}
        if($("#foto3").val() != null){dados.append('foto3', $("#foto3")[0].files[0]);}
        if($("#foto4").val() != null){dados.append('foto4', $("#foto4")[0].files[0]);}

        $.ajax({
            url: "../../../control/CRUDProduto/produtos.php",
            data: dados,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (retorno) {

                console.log(retorno);

                if (retorno === '1'){
                    alert("Novas fotos adicionadas com sucesso!");
                    reload();
                }else {
                    alert("Ocorreu um  erro ao alterar as fotos do produto.");
                }
            }
        });

    }else{
        var cupon;
        var frete;
        var destaque;
        if ($("#cupon").prop("checked") === true) {cupon = 1;}
        else if ($("#cupon").prop("checked") === false) {cupon = 0;}
        if ($("#frete").prop("checked") === true) {frete = 1;}
        else if ($("#frete").prop("checked") === false) {frete = 0;}
        if ($("#destaque").prop("checked") === true) {destaque = 1;}
        else if ($("#destaque").prop("checked") === false) {destaque = 0;}

        dados.append('idProduto', $("#idProduto").val());
        dados.append('tituloProd', $("#tituloProd").val());
        dados.append('descricaoBreve', $("#descricaoBreve").val());
        dados.append('descricaoProd', $("#descricao").val());
        dados.append('precoProd', $("#preco").val() + "." + $("#centavos").val());
        dados.append('precoPromoProd', $("#precoPromo").val() +"." + $("#centavosPromo").val());
        dados.append('estoqueProd', $("#estoque").val());
        dados.append('cuponProd', cupon);
        dados.append('destaque', destaque);
        dados.append('sku_ean', $("#SKUEAN").val());
        dados.append('marcaProd', $("#marca").val());
        dados.append('medidas', $("#altura").val() + ';' + $("#comprimento").val() + ';' + $("#largura").val() + ';' + $("#peso").val());
        dados.append('imagens', $("#imagensDoProduto").val());
        dados.append('entrega', frete);
        dados.append('VariacaoProd', $("#variacao").val());
        dados.append('CategoriaProd', $("#categoria").val());
        dados.append('SubCategoriaProd', $("#subcategoria").val());
        dados.append('alterar', '1');

        $.ajax({
            url: "../../../control/CRUDProduto/produtos.php",
            data: dados,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (retorno) {

                console.log(retorno);

                if (retorno === '1'){
                    alert("Produto alterado com sucesso!");
                    window.location.href = 'http://localhost/site/view/dashboard/produto/produto.php';
                }else {
                    alert("Ocorreu um  erro ao alterar o produto.");
                }
            }
        });
    }
}

$("#User_data").on('click', "#excluir", function () {
    const User = this.value;
    var id = $("#User_row" + User + " .id_val").html();

    let dados = {
        idProduto   : id,
        excluir     : 1
    };
    $.post('../../../control/CRUDProduto/produtos.php', dados, function (retorno) {
        console.log(retorno);
        if(retorno === '1'){
            alert("Produto deletado com sucesso!");
            reload();
        }else{
            alert("Ocorreu um erro ao deletar o produto.");
        }
    });
});