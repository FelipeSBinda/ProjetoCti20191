function confirmacao(id, a) {
     var resposta = confirm("Deseja remover esse registro?");
 
     if (resposta == true) {
     	a.href = "controllers/removerAlunoController.php?id="+id;
     }
}