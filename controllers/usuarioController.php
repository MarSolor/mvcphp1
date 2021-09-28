<?php
require_once 'models/usuarioModel.php';

class  usuarioController{
    public function index(){
        echo "Controlador Usuauarios, accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            //var_dump($_POST);
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            var_dump($usuario);
        }
    }
}

