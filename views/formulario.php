 <?php
if (isset($_GET["log"])) {
	buscarPorUsuario("aluno", );

	?>
 <section class="container">
    <form action="" method="post">
        <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" id="nome" type="text" value="">

            <div class="form-group">
                <label for="tel">Usuario</label>
                <input class="form-control" id="tel" type="tel" value="">
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>

    </form>
</section>
<?php
}
?>