<?php

abstract class Connection{
  private static $conn;
  //padrão singleton
  public static function getConn(){

    if(self::$conn == null){//Para ser criado apenas um objeto dessa classe
      self::$conn = new PDO('mysql: host=localhost; dbname=serie_criando_site', 'root', 'bcd127');
    }

    return self::$conn;
  }
}