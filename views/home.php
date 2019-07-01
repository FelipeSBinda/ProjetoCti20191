
<?php
session_start();

if (!isset($_SESSION["logado"]) || !$_SESSION["logado"]) {

	?>
  <div class="container">
       <form action="controllers/acessoController.php" method="POST">
           <legend>Formulario de Acesso</legend>
           <div class="form-group">
               <label for="login">Login</label>
               <input type="text" class="form-control" id="login" name="login" placeholder="Login">
           </div>
            <div class="form-group">
               <label for="senha">Senha</label>
               <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
       </div>
<?php
}
?>
