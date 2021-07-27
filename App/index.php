<link rel="stylesheet" href="CSS/styleEstrutura.css">
<?php

require_once './Core/Core.php';
require_once './Controller/HomeController.php';
require_once './Controller/ErroController.php';
require_once './Model/Postagem.php';
require_once '../Lib/DataBase/Connection.php';
require_once './Controller/PostController.php';

require_once '../vendor/autoload.php';

$template = file_get_contents('Template/estrutura.html');

ob_start();
  $core = new Core;
  $core->start($_GET); 
  $saida = ob_get_contents(); //Todo o conteúdo retornado de $core (no caso são os retornos das classes de Controller) está dentro dessa váriavel saída
ob_end_clean();

// echo $saida;

$templatePronto = str_replace('{{area_dinâmica}}', $saida, $template); //Vamos substituir o que está dentro de chaves para o que está na $saida e fornecemos a $template já com as determinadas mudanças.

/* É retornado um array vazio.Passando alguns dados na url, como: /?pagina=home&id=2, é retornado: 
array(2) { ["pagina"]=> string(4) "home" ["id"]=> string(1) "2" }*/

echo $templatePronto;