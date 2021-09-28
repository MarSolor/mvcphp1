<?php
//cargar la base de datos con require en el index 
//de forma que se pueda usar en el modelo
class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    //conexion a bd
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function getEmail(){
        return $this->email;
    }

    function getPassword(){
        return $this->password;
    }

    function getRol(){
        return $this->rol;
    }

    function getImagen(){
        return $this->imagen;
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombre){
        //se escaparan todos los datos que lleguen por el formulario de registro
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    
    function setPassword($password){
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);// encripta 4 veces
    }
    
    function setRol($rol){
        $this->rol = $rol;
    }

    function setImagen($imagen){
        $this->imagen = $imagen;
    }

    //se crea un metodo save para consultar con la bd
    //guardando la informacion en un  registro de la bd
    public function save(){
        //*se crea un query para guardar con insert
        $sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}