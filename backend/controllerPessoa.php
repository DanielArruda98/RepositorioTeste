<?php

    require "Pessoa.class.php";
    $pessoa = new Pessoa();

    if (isset($_POST['cadastrarPessoa'])) {
        $nome = (isset($_POST['nome'])) ? $_POST['nome'] : null;
        $idade = (isset($_POST['idade'])) ? $_POST['idade'] : null;

        $pessoa->cadastrar($nome, $idade);
    }

    if (isset($_GET['listarPessoas'])) {
        $dados = $pessoa->listar();

        foreach ($dados as $pessoa) {
            echo "
                <tr>
                    <td>" . $pessoa["nome"] . "</td>
                    <td>" . $pessoa["idade"] . "</td>
                    <td onclick='deletarPessoa(".$pessoa["id"].")'>Excluir</td>
                    <td onclick='consultarPessoa(".$pessoa["id"].")'>Editar</td>
                </tr>
            ";
        }
    }

    if (isset($_POST['deletarPessoa'])) {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;

        $pessoa->deletar($id);
    }

    if (isset($_POST['editarPessoa'])) {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;
        $nome = (isset($_POST['nome'])) ? $_POST['nome'] : null;
        $idade = (isset($_POST['idade'])) ? $_POST['idade'] : null;

        $pessoa->editar($id, $nome, $idade);
    }

    if (isset($_GET['consultarPessoa'])) {
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;

        $pessoa->consultar($id);
    }