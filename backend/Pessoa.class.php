<?php

    require_once "Conexao.class.php";

    class Pessoa {

        // Cadastro
        public function cadastrar($nome, $idade) {
            $conexao = new Conexao();
            $conn = $conexao->conectar();

            try {
                $sql = "INSERT INTO pessoas VALUES (null, :nome, :idade);";

                $consulta = $conn->prepare($sql);

                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":idade", $idade);

                $retorno = $consulta->execute();

                if($retorno) {
                    echo "Pessoa cadastrada";
                } else {
                    echo "Erro";
                }
            } catch(PDOException $e) {
                echo $e;
            }
        }

        // Listar
        public function listar() {
            $conexao = new Conexao();
            $conn = $conexao->conectar();

            try {
                $sql = "SELECT * FROM pessoas;";

                $consulta = $conn->prepare($sql);
                
                $consulta->execute();

                return $consulta->fetchAll();

            } catch(PDOException $e) {
                echo $e;
            }
        }

        // Deletar
        public function deletar($id) {
            $conexao = new Conexao();
            $conn = $conexao->conectar();

            try {
                $sql = "DELETE FROM pessoas WHERE id = :id;";

                $consulta = $conn->prepare($sql);

                $consulta->bindValue(":id", $id);

                $retorno = $consulta->execute();

                if($retorno) {
                    echo "Pessoa deletada com sucesso";
                } else {
                    echo "Erro ao deletar pessoa";
                }
            } catch(PDOException $e) {
                echo $e;
            }
        }

        // Editar
        public function editar($id, $nome, $idade) {
            $conexao = new Conexao();
            $conn = $conexao->conectar();

            try {
                $sql = "UPDATE pessoas SET nome = :nome, idade = :idade WHERE id = :id";

                $consulta = $conn->prepare($sql);

                $consulta->bindValue(":id", $id);
                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":idade", $idade);

                $retorno = $consulta->execute();

                if($retorno) {
                    echo "Pessoa atualizada com sucesso";
                } else {
                    echo "Erro ao atualizar pessoa";
                }

            } catch(PDOException $e) {
                echo $e;
            }
        }

        // Consultar
        public function consultar($id) {
            $conexao = new Conexao();
            $conn = $conexao->conectar();

            try {
                $sql = "SELECT * FROM pessoas WHERE id = :id;";

                $consulta = $conn->prepare($sql);
                
                $consulta->bindValue(":id", $id);

                $consulta->execute();

                $dados = $consulta->fetchAll()[0];
                echo json_encode($dados);

            } catch(PDOException $e) {
                echo $e;
            }
        }
    }

?>