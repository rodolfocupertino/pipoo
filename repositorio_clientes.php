<?php

 require 'database/conexao.php';
 include 'cliente.class.php';


 interface IRepositorioClientes {
 	public function cadastrarCliente($cliente);
 	public function removerCliente($cliente);
 	public function atualizarCliente($cliente);
 	public function buscarCliente($codigo);
 	public function getListaClientes($filtro);
 }

class RepositorioClientesMySQL implements IRepositorioclientes {

	private $conexao;

	public function __construct()
	{
		$this->conexao = new Conexao("localhost","root","mysql","pipoo");

		if ($this->conexao->conectar() == false)
		{
			echo "Erro " . mysqli_error();
		}

	}

	public function cadastrarCliente($cliente)
	{
		$nome			= $cliente->getNome();
		$cpf			= $cliente->getCPF();
		$endereco		= $cliente->getEndereco();
		$data_cadastro	= $cliente->getData_cadastro();
		$saldo_devedor	= $cliente->getSaldo_devedor();
		$situacao		= $cliente->getSituacao();

		$sql = "INSERT INTO clientes (nome, codigo, cpf, endereco, data_cadastro,saldo_devedor,situacao) VALUES 
		('$nome','','$cpf','$endereco','$data_cadastro','$saldo_devedor','$situacao')";

		$this->conexao->executarQuery($sql);
	}

	public function removerCliente($codigo)
	{

		$sql = " DELETE FROM clientes WHERE codigo='$codigo' ";
		$this->conexao->executarQuery($sql);

	}

	public function atualizarCliente($cliente)
	{


		$nome 			= $cliente->getNome();
		$codigo 		= $cliente->getCodigo();
		$cpf 			= $cliente->getCPF();
		$endereco 		= $cliente->getEndereco();
		$data_cadastro 	= $cliente->getData_cadastro();
		$saldo_devedor 	= $cliente->getSaldo_devedor();
		$situacao 		= $cliente->getSituacao();



		$sql = "UPDATE clientes SET nome='$nome',cpf='$cpf',
		endereco='$endereco',saldo_devedor='$saldo_devedor',situacao='$situacao' WHERE codigo = '$codigo' ";

		// echo $sql;
		// die();
		$this->conexao->executarQuery($sql);

	}



	public function buscarCliente($codigo)
	{
		$linha = $this->conexao->obtemPrimeiroRegistroQuery("SELECT * FROM clientes WHERE codigo='$codigo' ");

		$cliente = new Cliente(
			$linha['nome'],
			$linha['codigo'],
			$linha['cpf'],
			$linha['endereco'],
			$linha['data_cadastro'],
			$linha['saldo_devedor'],
			$linha['situacao']);

		return $cliente;
	}

	public function getListaClientes($filtro)
	{

		if (isset($filtro))
		{
			$filtro = " WHERE situacao like '%$filtro%' ";
		}
		
		$sql = "SELECT * FROM clientes $filtro ";
		//print_r($sql);

		$listagem = $this->conexao->executarQuery($sql);

		$arrayClientes = array();

		while( $linha = mysqli_fetch_array($listagem)){
			$cliente = new cliente(
				$linha['nome'],
				$linha['codigo'],
				$linha['cpf'],
				$linha['endereco'],
				$linha['data_cadastro'],
				$linha['saldo_devedor'],
				$linha['situacao']);
			array_push($arrayClientes, $cliente);
		} 
			return $arrayClientes;
	}

}

	$repositorio = new RepositorioclientesMySQL();

?>