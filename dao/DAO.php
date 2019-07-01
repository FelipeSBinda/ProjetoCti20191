<?php
require_once "Conexao.php";
class DAO {

	public $conn;

	public function __construct() {
		$this->conn = Conexao::conectar();
	}

	function inserir($tabela, $listaObjetos) {
		$tuplas = array();
		$toBind = array();
		$colunas = array_keys($listaObjetos[0]);
		foreach ($listaObjetos as $indice => $linha) {
			$parametros = array();
			foreach ($linha as $coluna => $valor) {
				$parametro = ":" . $coluna . $indice;
				$parametros[] = $parametro;
				$toBind[$parametro] = $valor;
			}
			$tuplas[] = "(" . implode(", ", $parametros) . ")";
		}
		$sql = "INSERT INTO `$tabela` (" . implode(", ", $colunas) . ") VALUES " . implode(", ", $tuplas);
		$stmt = $this->conn->prepare($sql);

		foreach ($toBind as $parametro => $valor) {
			$stmt->bindValue($parametro, $valor);
		}
		return $stmt->execute();
	}

	function buscarTodos($tabela) {
		$sql = "select id, nome,usuario from $tabela";
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $lista;
		} catch (Exception $e) {
			echo "Erro ao listar";
		}
	}

	function buscarUsuario($login) {
		$sql = "select login, senha, perfil from usuario where login = :login ";
		try {

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":login", $login);
			$stmt->execute();
			$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
			return $usuario;
		} catch (Exception $e) {
			echo "Erro ao consultar" . $e->getMessage();
		}
	}

	function buscarPorUsuario($tabela, $login) {
		$sql = "select id,nome, usuario, senha from $tabela inner join usuario on usuario = login where usuario = :login ";
		try {

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":login", $login);
			$stmt->execute();
			$objeto = $stmt->fetch(PDO::FETCH_ASSOC);
			return $objeto;
		} catch (Exception $e) {
			echo "Erro ao consultar" . $e->getMessage();
		}
	}
	function buscarPorId($tabela, $id) {
		$sql = "select id,nome, usuario from $tabela where id = :id ";
		try {

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
			$objeto = $stmt->fetch(PDO::FETCH_ASSOC);
			return $objeto;
		} catch (Exception $e) {
			echo "Erro ao consultar" . $e->getMessage();
		}
	}
	function alterar($tabela, $aluno) {
		$sql = "update $tabela set nome = :nome where id = :id ";
		try {

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":nome", $aluno->nome);
			$stmt->bindValue(":id", $aluno->id);
			return $stmt->execute();

		} catch (Exception $e) {
			echo "Erro ao Editar" . $e->getMessage();
		}
	}
	function excluir($tabela, $id) {
		$sql = "delete from $tabela where id = :id ";
		try {

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":id", $id);
			return $stmt->execute();

		} catch (Exception $e) {
			echo "Erro ao Excluir" . $e->getMessage();
		}
	}
	function excluirUsuario($login) {
		$sql = "delete from usuario where login = :login ";
		try {

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":login", $login);
			return $stmt->execute();

		} catch (Exception $e) {
			echo "Erro ao Excluir Usuario" . $e->getMessage();
		}
	}
}
?>