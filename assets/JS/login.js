$("#btnLogar").click(function (e) {
    e.preventDefault();
    let dados = {
        enderecodeemail : $("#mailADM").val(),
        senhadeentrada : $("#senhadeentrada").val(),
        name : $("#name").val(),
        email : $("#email").val()
    };
    $.post("../control/login/loginvalid.php",dados, function (retorno) {
        console.log(retorno);
        if(retorno == '1'){
            window.location.href= "dashboard/index.php";
        }else{
            alert("Dados incorretos para login");
            $("#senhadeentrada").val("");
            $("#name").val("");
            $("#email").val("");
            $("#senhadeentrada").focus();
        }
    });

});
