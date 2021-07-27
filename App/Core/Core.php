<?php

class Core {
  //$urlGet = $_GET na index.
  public function start($urlGet){
    $acao = 'index'; //Método
    if(isset($urlGet['pagina'])){
      //tratamento da requisição get
      $controller = ucfirst($urlGet['pagina'] . 'Controller');// echo $controller; //Passando na url: '?pagina=home', ecoa: HomeController 
    }else{
      $controller = 'HomeController';
    }  
    if(!class_exists($controller)){
      $controller = "ErroController";
    }
    if(isset($urlGet['id']) && $urlGet['id'] != null){
      call_user_func_array(array(new $controller, $acao), array('id' => $urlGet['id']));
    }else{
      call_user_func_array(array(new $controller, $acao), array());
    }
    
  }
}