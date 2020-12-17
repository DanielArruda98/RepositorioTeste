<?php

    if (isset($_POST['cadastrarPessoa'])) {
        $nome = (isset($_POST['nome'])) ? $_POST['nome'] : null;
        $idade = (isset($_POST['idade'])) ? $_POST['idade'] : null;

        echo $nome." FOI CADASTRADO COM SUCESSO";
    }

    if (isset($_GET['listarPessoas'])) {
        // consulta 
        $dados["pessoas"][0]["nome"] = "Pedro";
        $dados["pessoas"][0]["idade"] = 19;

        $dados["pessoas"][1]["nome"] = "João";
        $dados["pessoas"][1]["idade"] = 12;

        foreach ($dados["pessoas"] as $pessoa) {
            echo "<tr>
                    <td>" . $pessoa["nome"] . "</td>
                    <td>" . $pessoa["idade"] . "</td>
                </tr>
                ";
        }
    }