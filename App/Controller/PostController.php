<?php
  class PostController{
    public $id;
    public function index($id){
      var_dump($id);
      try{
        $modelPostagem = Postagem::selecionarPeloId($id);
        $loader = new \Twig\Loader\FilesystemLoader('./View');
        $twig = new \Twig\Environment($loader);
        $viewHome = $twig->load('single.html');
        $parametros = array();
        $parametros['postagem'] = $modelPostagem;
        $parametros['nome'] = 'Jonatan';
        
        var_dump($parametros['postagem']);
        $conteudo = $viewHome->render($parametros);
        echo $conteudo;
      }catch(Exception $e){
        echo $e->getMessage();
      } 
    }

  }

?>