<?php

class HomeController{
  public function index(){
    try{//Tentará executar o código, caso não consiga fazer o mesmo, então ele cai no catch (captura da Exception)
      $modelPostagem = Postagem::selecionarTodos();
      $loader = new \Twig\Loader\FilesystemLoader('./View');
      $twig = new \Twig\Environment($loader);
      $viewHome = $twig->load('home.html');
      $parametros = array();
      $parametros['postagens'] = $modelPostagem;
      $parametros['nome'] = 'Jonatan';
      
      // $parametros['nome'] = 'Jonatan'; //Se quisermos renderizar o nome dentro da view, basta digitar: {{nome}}
      var_dump($parametros['postagens']);
      $conteudo = $viewHome->render($parametros);
      echo $conteudo; //É carregado a view (home.html) e renderizado os dados do banco graças a função "render()".

      // echo "HOME";
      // $modelPostagem = Postagem::selecionarTodos();
      // echo "<pre>";
      // var_dump($modelPostagem);
      // echo "</pre>";
		
    }catch(Exception $e){
      echo $e->getMessage();
    }

    
  }
}