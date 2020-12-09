<?php
function conectar(){
	$host = "localhost";
	$bdname   = "ru_ifma";
	$username = "root";
	$password = "";

	$con = new mysqli($host, $username, $password, $bdname);

	return $con;
}
	$conexao = conectar ();
?>