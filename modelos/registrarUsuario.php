<?php

class registrarUsuario{

   
    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }
    

    public function RegistrarNuevoUsuario($nombre, $apellido, $direccion, $telefono, $correoElectronico, $genero) {
        try {
            $tipoUsuario = "UsuarioComun"; // Agrega esta línea para asignar el valor "UsuarioComun" al tipo de usuario
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre, apellido, direccion, telefono, correoElectronico, genero, TipoDeUsuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $apellido, $direccion, $telefono, $correoElectronico, $genero, $tipoUsuario]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Error al registrar el usuario: " . $e->getMessage());
        }
    }

    public function correoElectronicoExistente($correoElectronico) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE correoElectronico = ?");
            $stmt->execute([$correoElectronico]);
            $count = $stmt->fetchColumn();
            return $count > 0; 
        } catch (PDOException $e) {
            throw new Exception("Error al verificar el correo electrónico: " . $e->getMessage());
        }
    }
    
}