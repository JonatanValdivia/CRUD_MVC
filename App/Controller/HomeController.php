<?php
require_once './App/Model/Postagem.php';

class HomeController{
  public function index(){
    try{//Tentará executar o código, caso não consiga fazer o mesmo, então ele cai no catch (captura da Exception)
      echo "HOME";
      $modelPostagem = Postagem::selecionarTodos();
      echo "<pre>";
      var_dump($modelPostagem);
      echo "</pre>";
		
    }catch(Exception $e){
      echo $e->getMessage();
    }

    
  }
}