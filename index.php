<link rel="stylesheet" href="App/CSS/styleEstrutura.css">
<?php

require_once './App/Core/Core.php';
require_once './App/Controller/HomeController.php';
require_once './App/Controller/ErroController.php';

$template = file_get_contents('App/Template/estrutura.html');

ob_start();
  $core = new Core;
  $core->start($_GET); 
  $saida = ob_get_contents(); //Todo o conteúdo retornado de $core (no caso são os retornos das classes de Controller) está dentro dessa váriavel saída
ob_end_clean();

echo $saida;

$templatePronto = str_replace('{{area_dinâmica}}', $saida, $template); //Vamos substituir o que está dentro de chaves para o que está na $saida e fornecemos a $template já com as determinadas mudanças.

/* É retornado um array vazio.Passando alguns dados na url, como: /?pagina=home&id=2, é retornado: 
array(2) { ["pagina"]=> string(4) "home" ["id"]=> string(1) "2" }*/

echo $templatePronto;