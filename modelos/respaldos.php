<?php
require_once "controladores/respaldos.controlador.php";
?>

<?php

class Respaldos{
    private $pdo;

    public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
    }

    //Aqui se realiza el respaldo de la base de datos en la carpeta solicitada
    //Se recibe: Ruta de la carpeta de respaldos
    //Se manda: Se devuelve el archivo respaldo.sql
    public function respaldarBaseDeDatos($rutaArchivo){
        $mysqlDatabaseName = 'BDMascotas';
        $mysqlUserName = 'root';
        $mysqlPassword = '';
        $mysqlHostName = 'localhost';

        $fecha = date("Ymd-His"); 

        $salida_sql = $mysqlDatabaseName . 'Respaldo_'.$fecha.'.sql';

        //Aqui se exporta de la base de datos y salida del status
        $command = 'mysqldump --column-statistics=0 --opt -h' . $mysqlHostName . ' -u' . $mysqlUserName . ' --password="' . $mysqlPassword . '" ' . $mysqlDatabaseName . ' > ' . $salida_sql;
        system($command, $output);


        $zip = new ZipArchive();

        $salida_zip = $mysqlDatabaseName . 'Respaldo' . '.zip';

        if ($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true) {
            $zip->addFile($salida_sql);
            $zip->close();
            unlink($salida_sql);
            header("Location: $salida_zip");
        } else {
            echo 'Error';
        }

    }


    /*public function restaurarBaseDeDatos(){
        $mysqlDatabaseName = 'BDMascotas';
        $mysqlUserName = 'root';
        $mysqlPassword = '';
        $mysqlHostName = 'localhost';
    
          // Descomprimir el archivo ZIP
          $zip = new ZipArchive();

          $salida_zip = $mysqlDatabaseName . 'Respaldo' . '.zip';
          $rutaDescomprimida = 'backup/';
  
          if ($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true) {
              $zip->extractTo($rutaDescomprimida);
              $zip->close();
              unlink($salida_sql);
              header("Location: $salida_zip");
          } else {
              echo 'Error al descomprimir el archivo ZIP';
              return;
          }


        $mysqlImportFilename ='BDMascotasRespaldo.sql';
    
        $command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' --password="' . $mysqlPassword . '" ' . $mysqlDatabaseName . ' < ' . $mysqlImportFilename;
        system($command,$output);

    
        //header("Location: $salida_zip");
        // Seleccionar el archivo .sql para restaurar

        // Restaurar la base de datos utilizando el archivo .sql
        /*$command = 'mysql -h' . $mysqlHostName . ' -u' . $mysqlUserName . ' --password="' . $mysqlPassword . '" ' . $mysqlDatabaseName . ' < ' . $rutaDescomprimida . '/' . $archivoSql;
        system($command, $output,$worked);
    
        echo 'Restauración de la base de datos completada';
    }*/


    //Aqui se restaura la ase de datos una vez obtenida la ruta y el archivo.sql
    //Se recibe: archivo.sql
    //Se devuelve: la restauración de la base de datos
    public function restaurarBaseDeDatos($archivoSql){
        $mysqlDatabaseName = 'BDMascotas';
        $mysqlUserName = 'root';
        $mysqlPassword = '';
        $mysqlHostName = 'localhost';
    
        //Aqui se escomprimir el archivo ZIP
        $zip = new ZipArchive();
    
        $salida_zip = $mysqlDatabaseName . 'Respaldo' . '.zip';
        $rutaDescomprimida = 'backup/';
    
        if ($zip->open($salida_zip, ZipArchive::CREATE) === true) {
            $zip->extractTo($rutaDescomprimida);
            $zip->close();
            unlink($salida_sql);
            header("Location: $salida_zip");
        } else {
            echo 'Error al descomprimir el archivo ZIP';
            return;
        }
    
        //Aqui se obtiene información sobre el archivo SQL cargado
        $nombreArchivo = $archivoSql['name'];
        $tipoArchivo = $archivoSql['type'];
        $rutaTemporal = $archivoSql['tmp_name'];
    
        // Aqui se mueve el archivo a la ruta deseada
        $rutaCompletaArchivoSql = $rutaDescomprimida . '/' . $nombreArchivo;
        move_uploaded_file($rutaTemporal, $rutaCompletaArchivoSql);
    
        // Aqui se restaura la base de datos utilizando el archivo .sql
        $command = 'mysql -h' . $mysqlHostName . ' -u' . $mysqlUserName . ' --password="' . $mysqlPassword . '" ' . $mysqlDatabaseName . ' < ' . $rutaCompletaArchivoSql;
        system($command, $output);
    
        echo 'Restauración de la base de datos completada';
    }



}