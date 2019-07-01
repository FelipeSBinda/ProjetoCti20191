<?php
require_once "../models/Aluno.php";
require_once "../dao/DAO.php";
session_start();
if (isset($_SESSION["perfil"])) {
	if ($_SESSION["perfil"] == "prof") {
		$al = new Aluno();
		$dao = new DAO();
		if (isset($_POST["nome"]) && isset($_POST["id"])) {

			$al->nome = $_POST["nome"];
			$al->id = $_POST["id"];
			$alterou = $dao->alterar("aluno", $al);

			if ($alterou) {
				echo "<script>
	        alert('Alterado com Sucesso');
	        window.open('../index.php?pagina=alunos','_self')</script>";
			}
		}
	}
}
?>