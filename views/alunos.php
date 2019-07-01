<?php
session_start();
if (isset($_SESSION["perfil"])) {

	if ($_SESSION["perfil"] == "prof") {
		?>
            <section class="container" id="tabela">
     <?php
echo "<div class='col-sm'> <a href='?pagina=novo'>";
		include "assets/icons/plus.svg";
		echo "</a>";
		?>
                <div class="row">
                    <div class="col-sm">Aluno</div>
                    <div class="col-sm">Login</div>
                    <div class="col-sm">Ações</div>
                </div>
                    <?php
$dao = new DAO();
		$alunos = $dao->buscarTodos("aluno");
		foreach ($alunos as $aluno) {
			echo " <div class='row'>";
			foreach ($aluno as $coluna => $valor) {
				echo "<div class='col-sm'> $valor </div>";
			}
			echo "<div class='col-sm'> <a href='?pagina=editar&log=" . $aluno["usuario"] . "'>";
			include "assets/icons/resume.svg";
			echo "</a> <a href='' onclick='confirmacao(" . $aluno["id"] . ",this)'>";
			include "assets/icons/delete2.svg";
			echo "</a> </div></div>";
		}
		?>
                </div>
            </section>
            <?php
}

} else {
	session_destroy();
	echo "<script>
        alert('Página Restrita Fazer login como professor');
        window.open('index.php','_self')</script>";
}

?>
<script type="text/javascript" src="assets/script/script.js"></script>