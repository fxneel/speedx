<?php
//Inicia a sessão.
session_start();
// Retira o cache.
session_cache_limiter('no_cache');

	if(empty($_SESSION["usuario"]) || empty($_SESSION["idCad"] )){
		header("Location:http://www.speedx.com.br/");
	}
	if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ){
		$tempoAtual = time();

	if ( ($tempoAtual - $_SESSION['ultimoClick']) > '7200' ) { //Tempo em segundos = 2 horas.

		echo "<script> 
				alert ('Inatividade maior do que 2 horas! Redirecionando...');
			 </script>";
	
		// Destroi a sessão.
		unset($_SESSION['ultimoClick']);
		$_SESSION = array();
		session_destroy();
		// redireciona.
		header("Location:logout.php");
		exit();
	}else{
		$_SESSION['ultimoClick'] = time();
		}
	}
?>