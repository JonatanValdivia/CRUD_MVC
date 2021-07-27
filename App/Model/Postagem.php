<?php

class Postagem{
   
  public static function selecionarTodos(){
    $con = Connection::getConn();
    $sql = "SELECT * FROM postagem order by idPostagem desc";
    $sql = $con->prepare($sql);
    $sql->execute();
    $resultado = array();
    while($row = $sql->fetchObject('Postagem')){
      $resultado[] = $row;
    }
    if(!$resultado){
      throw new Exception(" - Não foi encontrado nenhum registro no banco");
      exit;
    }

    return $resultado;
  }
}