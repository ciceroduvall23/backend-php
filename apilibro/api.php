<?php
 
class Api{

public function getLibros(){
     $vector = array();
     $conexion = new conexion();
     $db = $conexion->getConexion();
     $sql = "SELECT * FROM libro";
     $consulta = $db->prepare($sql);
     $consulta->execute();
     while($fila = $consulta->fetch()) {
        $vector[] = array(
          "id" => $fila['id'],
          "nome" => $fila['nome'],
          "email" =>  $fila['email']); }

          /*   "nombre" => $fila['nombre'],
          "edicion" =>  $fila['edicion']); }*/
     return $vector;
}

public function addLibro($nome, $email){
  
  $conexion = new conexion();
  $db = $conexion->getConexion();
  $sql = "INSERT INTO libro (nome, email) VALUES (:nome,:email)";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':nome', $nome);
  $consulta->bindParam(':email', $email);
  $consulta->execute();

  return '{"msg":"Usuário cadastrado com sucesso !"}';
}

public function deleteLibro($id){
  $conexion = new conexion();
  $db = $conexion->getConexion();
  $sql = "DELETE FROM libro WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id); 
  $consulta->execute();

  return '{"msg":"Usuário excluído"}';
}

public function getLibro($id){
  $vector = array();
  $conexion = new conexion();
  $db = $conexion->getConexion();
  $sql = "SELECT id, nome, email FROM libro WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);
  $consulta->execute();
  while($fila = $consulta->fetch()) {
     $vector[] = array(
       "id" => $fila['id'],
       "nome" => $fila['nome'],
       "email" =>  $fila['email']); }

  return $vector[0];
}

public function updateLibro($id, $nome, $email){
  
  $conexion = new conexion();
  $db = $conexion->getConexion();
  $sql = "UPDATE libro SET nome=:nome, email=:email WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);  
  $consulta->bindParam(':nome', $nombre);
  $consulta->bindParam(':email', $email);
  $consulta->execute();

  return '{"msg":"Usuário atualizado com sucesso!"}';
}



}
?>