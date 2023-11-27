<?php

class BasedeDatos{

    const servidor="localhost";
    const usuariobd="root";
    const clave="";
    const nombrebd="BDMascotas";

    //Aqui se realiza la conexion de la base de datos al servidor local
    //Se obtiene: el nombre del servidor, el nombre del usuario, la contraseña de la BD y la base de datos
    //Se devuelve: la conexion establecida con el servidor
    public static function Conectar(){
        try{
            $conexion = new PDO("mysql:host=".self::servidor.";dbname=".self::nombrebd.";chartset=utf8",self::usuariobd,self::clave);

            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conexion;

        }catch(PDOException $e){
            return "Falló la conexión".$e->getMessage();
        }

    }


}