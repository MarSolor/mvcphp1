<?php
//clase de conexion con metodo estatico
class connect{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '','tienda_master');
        $db->query("SET NAMES 'UTF8'");
        return $db;
    }
}