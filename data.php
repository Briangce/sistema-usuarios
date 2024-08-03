<?php
include_once "./geral.php";
class Data extends Geral
{
    public function updateUser($id,$nome,$email,$situacao,$data_admissao){
        $this->conectBase("Execute","UPDATE colaboradores SET nome='{$nome}',email='{$email}',situacao='{$situacao}',data_admissao='{$data_admissao}' WHERE id = '{$id}'");
    }

    public function criarUser($nome,$email,$data_admissao){
        return $this->conectBase("Execute","INSERT INTO colaboradores (nome,email,situacao,data_admissao) VALUES ('$nome','$email','ativo','$data_admissao')");
    }

    public function users(){
        return $this->conectBase("GetArray","select * from colaboradores");
    }

    public function deletarUser($id){
        return $this->conectBase("Execute","delete from colaboradores where id = '{$id}'");
    }

    public function editarUser($id){
        return $this->conectBase("GetArray","select * from colaboradores where id = '{$id}'");
    }

    public function auth($email, $senha){
        $nome =  $this->conectBase("GetArray","select * from usuarios where email = '$email' and senha = '$senha'");
        // $this->pre($nome);
        // exit;

        if (count($nome) == 1) {
            return $nome;
        } else {
            return false;
        }
    }
}