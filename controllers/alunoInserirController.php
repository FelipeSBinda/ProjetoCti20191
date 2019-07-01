<?php
require_once "../models/Aluno.php";
require_once "../models/Usuario.php";
require_once "../dao/DAO.php";
session_start();
if (isset($_SESSION["perfil"])) {
	if ($_SESSION["perfil"] == "prof") {
		$dao = new DAO();
		if (isset($_POST["nome"]) && isset($_POST["login"]) && isset($_POST["senha"])) {
			$us = array(
				array(
					'login' => $_POST["login"],
					'senha' => $_POST["senha"],
					'perfil' => "al",
				),
			);
			$al = array(
				array(
					'nome' => $_POST["nome"],
					'usuario' => $_POST["login"],
				),
			);
			$dao->inserir("usuario", $us);
			$salvou = $dao->inserir("aluno", $al);

			if ($salvou) {
				echo "<script>alert('Salvo Com Sucesso');
        		window.open('../index.php?pagina=alunos','_self')</script>";
			}
		}
	}
}
?>