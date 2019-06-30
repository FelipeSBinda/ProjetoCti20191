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
		$stmt->execute();
	}

	function buscarTodos($tabela) {
		$sql = "select nome,usuario_aluno from $tabela";
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
		$sql = "select nome,login from usuario
		inner join $tabela on usuario=login
		where login = :login ";
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
}
?>