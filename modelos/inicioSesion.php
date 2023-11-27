<?php

class inicioSesion{

   
    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }
    
    public function validarCredenciales($correo, $contraseña) {
        $query = "SELECT * FROM usuarios WHERE CorreoElectronico = :correo AND Contraseña = :contrasena";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contraseña); 
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if ($usuario['TipoDeUsuario'] == 'Administrador') {
                return 'Administrador';
            } elseif($usuario['TipoDeUsuario'] == 'Rescatista'){
                return 'Rescatista';
            }elseif($usuario['TipoDeUsuario'] == 'UsuarioComun') {
               return 'UsuarioComun';
            }
         }else{
            return 'Invalido';
        }
    }

    public function validarNombre($correo, $contraseña) {
        $query = "SELECT ID, Nombre, TipoDeUsuario FROM usuarios WHERE CorreoElectronico = :correo AND Contraseña = :contrasena";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contraseña);
        $stmt->execute();
    
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($usuario) {
            return $usuario; 
        } else {
            return null; 
        }
    }
    
}