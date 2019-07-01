<?php
require_once "../dao/DAO.php";
if (isset($_GET["id"])) {
	$dao = new DAO();
	$aluno = $dao->buscarPorId('aluno', $_GET["id"]);
	$dao->excluir('aluno', $_GET["id"]);
	$excluiu = $dao->excluirUsuario($aluno["usuario"]);
	if ($excluiu) {
		echo "<script>alert('Excluido Com Sucesso');
        		window.open('../index.php?pagina=alunos','_self')</script>";
	}

}
?>