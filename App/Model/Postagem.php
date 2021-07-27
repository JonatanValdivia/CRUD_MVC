<?php

class Postagem{
   
  public static function selecionarTodos(){
    $con = Connection::getConn();
    $sql = "SELECT * FROM postagem order by idPostagem desc";
    $sql = $con->prepare($sql);
    $sql->execute();
    $resultado = array();
                                  //Criar um objeto da classe postagem
    while($row = $sql->fetchObject('Postagem')){
      $resultado[] = $row;
    }
    if(!$resultado){
      throw new Exception(" - Não foi encontrado nenhum registro no banco");
      exit;
    }
    return $resultado;
  }

  public static function selecionarPeloId($id){
    $con = Connection::getConn();
    $sql = "SELECT titulo, conteudo from postagem where idPostagem = :id;";
    $sql = $con->prepare($sql);
    //Dizendo que é um valor inteiro
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $resultado = array();         //Criar um objeto da classe postagem
    $resultado = $sql->fetchObject('Postagem');

    if(!$resultado){ /*Quando uma array é vazia, logo a mesma não é true, sendo false*/
      $mensagem = new Exception("Não foi encontrado nenhum registro no banco");
    }

    return $resultado;
  }
}