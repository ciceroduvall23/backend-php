<?php

class Conexion {
	
 public function getConexion(){
   $host = "localhost";  //127.0.0.1 0 localhost
   $db = "dblibro";      //base de datos de mysql
   $user = "root";       // usuario de mysql
   $password = "";       //contraseña de mysql

//conexão com o banco de dados
 $db = new PDO("mysql:host=$host;dbname=$db;", $user, $password);

  return $db;
}

}

?>