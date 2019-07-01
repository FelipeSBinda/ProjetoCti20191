 <?php
if (isset($_GET["pagina"])) {
	$nome = "";
	$log = "";
	$senha = "";
	$textoBotao = "Salvar";
	$action = "controllers/alunoInserirController.php";
	if (isset($_GET["log"])) {

		if ($_GET["pagina"] == "editar") {
			$dao = new DAO();
			$aluno = $dao->buscarPorUsuario("aluno", $_GET["log"]);
			$nome = $aluno["nome"];
			$log = $aluno["usuario"];
			$id = $aluno["id"];
			$senha = $aluno["senha"];
			$textoBotao = "editar";
			$action = "controllers/alunoAlterarController.php";
		}
	}
	?>
 <section class="container">
    <form action="<?=$action?>" method="post">
        <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" id="nome" name="nome" type="text" value="<?=$nome?>">
</div>
 <?php
if ($_GET["pagina"] == "novo") {
		?>
            <div class="form-group">
                <label for="login">Usuario</label>
                <input class="form-control" id="login" name="login" type="text">
            </div>
                  <div class="form-group">
                <label for="senha">Senha</label>
                <input class="form-control" id="senha" type="password" name="senha">
            </div>

<?php
}
	?>

                <input type="hidden" value="<?=$id?>" name="id">



        <button type="submit" class="btn btn-primary"><?=$textoBotao?></button>

    </form>
</section>
<?php
}
?>