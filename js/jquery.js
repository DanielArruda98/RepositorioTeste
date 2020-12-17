// # id
// . classe

listar();

function listar() {
    var table = $("#pessoas");

    var dados = {
        listarPessoas: 1,
    }

    $.get("backend/controllerPessoa.php", dados,function (retorna) {
        table.html(retorna);
    });    
}

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
        listar();
    });    

});

function deletarPessoa(id) {
    var dados = {
        deletarPessoa : 1,
        id : id
    }

    $.post("backend/controllerPessoa.php", dados, function (retorna) {
        alert(retorna);
        listar();
    });    
}

// Conhecendo a pessoa
function consultarPessoa(id) {
    var dados = {
        consultarPessoa : 1,
        id : id
    }

    $.get("backend/controllerPessoa.php", dados, function (retorna) {
        var dados = JSON.parse(retorna);

        $("#editar_id").val(dados.id);
        $("#editar_nome").val(dados.nome);
        $("#editar_idade").val(dados.idade);

        $("#editar_pessoa").show("fast");
    });
}

// Salvando a pessoa
$("#editar_enviar").click(function() {
    var id = $("#editar_id").val();
    var nome = $("#editar_nome").val();
    var idade = $("#editar_idade").val();

    var dados = {
        editarPessoa: 1,
        id: id,
        nome: nome,
        idade: idade
    }

    $.post("backend/controllerPessoa.php", dados,function (retorna) {
        alert(retorna);
        $("#editar_pessoa").fadeOut("slow");
        listar();
    });    

});