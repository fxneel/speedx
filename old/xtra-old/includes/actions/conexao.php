<?php

	// Localhost
	function abre(){
		$conexao = mysql_connect("localhost", "root", "") or print (mysql_error());
		$banco = mysql_select_db("speedx", $conexao) or print (mysql_error());
	}
	
	// Remoto
	/*
	function abre(){
		$conexao = mysql_connect('speedcombr.ipagemysql.com', 'speedx', 'matrix@1477') or print (mysql_error());
		$banco = mysql_select_db("speedx", $conexao) or print (mysql_error());
	}
	*/
	function fecha(){
		mysql_close();
	}
?>