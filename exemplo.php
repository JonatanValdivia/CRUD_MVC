<?php
//Trabalhando de uma forma sem URL-amigável, mas QueryString
	$uri = $_GET;
	var_dump($uri);
	/*exemplo.php?nome=Jonatan&idade=17
		Retorno:
		array(2) { ["nome"]=> string(7) "Jonatan" ["idade"]=> string(2) "17" }
	*/
