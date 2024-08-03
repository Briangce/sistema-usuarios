<?php
include_once "./geral.php";
class Action extends Geral
{
    private $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function showLogin($text=""){
        $usuario = $_SESSION;
        if (empty($usuario)) {
            $erro_login = $text;
            require "./pages/login.php";
        } else {
            $nome = $usuario["usuario"]->nome;
            $data_criacao = $usuario["usuario"]->data_criacao;

            require "./pages/painel.php";
        }
    }

    public function doLogin(){
        $ret = $this->service->autenticar($this->getParam("email"), $this->getParam("password"));
        if (!$ret[0]) {
            $this->showLogin($ret[1]);
            exit;
        } else {
            $usuario = $ret[1];
            $_SESSION = $usuario;
            session_write_close(); 
            $nome = $usuario["usuario"]->nome;
            require "./pages/painel.php";
        }
    }

    public function logout(){
        session_destroy();
    }

    public function getUsers(){
        echo $this->service->getUsers();
    }

    public function menu(){
        
        // $this->pre($this->getParam("page"));
        
        include("./pages/".$this->getParam("page") . ".php");
    }

    private function validaAutenticacao(){
        if (!empty($_SESSION["usuario"])) {
            return true;
        } else {
            $this->showLogin();
            exit;
        }
    }

    public function criarUser(){
        $this->validaAutenticacao();
        $dados = json_decode(json_encode($this->getParam("userData")));
        $valid = $this->service->verifyDadosUser(['username','email','data'], $dados);

        if(!$valid[0]){
            echo json_encode($valid);
            exit;
        }else{
            $this->service->criarUser($dados->user,$dados->email,$dados->data);
            echo json_encode($valid);
        }
    }
    public function deletarUser(){
        $this->validaAutenticacao();
        
            $dados = json_decode(json_encode($this->getParam("id")));
            // Criar validações de email, user e dados vazios
            // $this->pre($dados);
            // exit;
            echo $this->service->deletarUser($dados);
    }
    public function updateUser(){
        $this->validaAutenticacao();

        $dados = json_decode(json_encode($this->getParam("userData")));
        
        echo $this->service->updateUser($dados->id,$dados->user,$dados->email,$dados->situacao,$dados->data);
    }

    public function actionPage(){
        $this->validaAutenticacao();
        
        switch ($this->getParam("action")) {
            case 'editarUser':
                echo json_encode($this->service->editarUser($this->getParam("id")));
                break;
            default:
                break;
        }
    }

    public function addFormEditarUser(){
        $this->validaAutenticacao();
        
        include("./pages/addFormEditarUser.php");
    }
    public function addFormCriarUser(){
        $this->validaAutenticacao();

        include("./pages/addFormCriarUser.php");
    }
}
