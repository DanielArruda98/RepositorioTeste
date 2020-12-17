// # id
// . classe

var table = $("#pessoas");

var dados = {
    listarPessoas: 1,
}

$.get("backend/controllerPessoa.php", dados,function (retorna) {
    table.html(retorna);
});

// --------------------------------------

$("#enviar").click(function() {
    var nome = $("#nome").val();
    var idade = $("#idade").val();

    // alert("Nome: "+nome+"\nIdade: "+idade);

    var dados = {
        cadastrarPessoa: 1,
        nome: nome,
        idade: idade
    }

    $.post("backend/controllerPessoa.php", dados,function (retorna) {
        alert(retorna);
    });    

});

