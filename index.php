<?php require "controllers/RotaController.php";
require "dao/DAO.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle Acadêmico</title>
    <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/estilos/estilo.css">
</head>

<body>
    <div id="container">
        <header class="card-header sticky-top">

            <nav class="navbar navbar-dark bg-light">
                            <h1>Controle Acadêmico</h1>
                <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link active" href="?pagina=home">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?pagina=alunos">Alunos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="?pagina=sair">Sair</a>
                      </li>

                    </ul>
        </header>
        <main>
            <?php
$rota = new RotaController();
$pagina = "home";
if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
}
switch ($pagina) {
case "home":$rota->home();
	break;
case "alunos":$rota->alunos();
	break;
case "editar":$rota->edicao();
	break;
case "novo":$rota->novo();
	break;
case "sair":
	session_start();
	session_destroy();
	echo "<script>
        window.open('index.php','_self')</script>";
	break;
}
?>
        </main>
        <footer class="card fixed-bottom">
          <div class="row">
              <div class="col-md">Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/"                 title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"                 title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
       <div class="col-md">Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"                 title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"                 title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
       <div class="col-md">Icons made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"                 title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"                 title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
          </div>
            &copy;Todos os Direitos Reservados
        </footer>
    </div>
    <script src="assets/scripts/acao.js"></script>
</body>

</html>