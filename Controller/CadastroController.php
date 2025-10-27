<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/CadastroModel.php";  

class usuarioController{
    private $usuarioModel;
    public function __construct($pdo){
        $this->usuarioModel = new UsuarioModel($pdo);

    }

    public function listarUsuario(){
        $usuarios = $this->usuarioModel->buscarTodosPUsuarios();
        include_once "C:/Turma1/xampp/htdocs/hotel-project/View/Usuario/listarUsuario.php";
        return;
    }

    public function buscarUsuario($id){
        $usuarios = $this->usuarioModel->buscarUsuario($id);
        return $usuarios;
    }

    public function cadastrarUsuario($nome, $email, $cpf, $telefone, $senha){
        $this->usuarioModel->cadastrarUsuario($nome, $email, $cpf, $telefone, $senha);   
    }

    public function editarUsuario($nome, $email, $cpf, $telefone, $senha, $id){
        $this->usuarioModel->editarUsuario($nome, $email, $cpf, $telefone, $senha, $id);
    }

    public function deletarUsuario($id){
        $usuarios = $this->usuarioModel->deletarUsuario($id);
        return $usuarios;
    }
}

?>