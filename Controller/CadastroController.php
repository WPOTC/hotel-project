<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/CadastroModel.php";  

class UsuarioController{
    private $usuarioModel;
    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);

    }

    public function listarUsuario(){
        $usuarios = $this->usuarioModel->buscarTodosUsuarios();
        include_once "C:/Turma1/xampp/htdocs/hotel-project/View/Usuario/listarUsuario.php";
        return;
    }

    public function buscarUsuario($id){
        $usuarios = $this->usuarioModel->buscarUsuario($id);
        return $usuarios;
    }

    public function cadastrarUsuario($nome, $email, $cpf, $telefone, $senha){
       $cadastro = $this->usuarioModel->cadastrarUsuario($nome, $email, $cpf, $telefone, $senha);   
       return $cadastro;
          
    }

    public function editarUsuario($nome, $email, $cpf, $telefone, $senha, $id){
        $this->usuarioModel->editarUsuario($nome, $email, $cpf, $telefone, $senha, $id);
    }

    public function deletarUsuario($id){
        $usuarios = $this->usuarioModel->deletarUsuario($id);
        return $usuarios;
    }

    public function loginUsuario($email, $senha){
        $usuario = $this->usuarioModel->loginUsuario($email, $senha);
        return $usuario;
    }
}

?>