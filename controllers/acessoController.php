<?php
require "../dao/DAO.php";
session_start();
$dao = new DAO();
if (isset($_POST["login"]) && isset($_POST["senha"])) {
	$usuario = $dao->buscarUsuario($_POST["login"]);
	if ($_POST["login"] == $usuario["login"]
		&& $_POST["senha"] == $usuario["senha"]) {

		$_SESSION["logado"] = true;
		$_SESSION["usuario"] = $usuario["login"];
		$_SESSION["perfil"] = $usuario["perfil"];
		echo "<script>
		window.open('../index.php?pagina=alunos','_self')</script>";
	} else {

		session_destroy();
		echo "<script>
		alert('Dados incorretos Tente Novamente');
		window.open('../index.php','_self')</script>";
	}
}
?>

