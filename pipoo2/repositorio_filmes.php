<?php

 require 'database/conexao.php';
 include 'filme.class.php';


 interface IRepositorioFilmes {
 	public function cadastrarFilme($filme);
 	public function removerFilme($filme);
 	public function atualizarFilme($filme);
 	public function buscarFilme($codigo);
 	public function getListaFilmes();
 }

class RepositorioFilmesMySQL implements IRepositorioFilmes {

	private $conexao;

	public function __construct()
	{
		$this->conexao = new Conexao("localhost","root","mysql","pipoo");

		if ($this->conexao->conectar() == false)
		{
			echo "Erro " . mysqli_error();
		}

	}

	public function cadastrarFilme($filme)
	{
		$titulo		= $filme->getTitulo();
		$sinopse	= $filme->getSinopse();
		$quantidade	= $filme->getQuantidade();
		$trailer	= $filme->getTrailer();

		$sql = "INSERT INTO filmes (titulo, codigo, sinopse, quantidade, trailer) VALUES 
		('$titulo','','$sinopse','$quantidade','$trailer')";

		$this->conexao->executarQuery($sql);
	}

	public function removerFilme($codigo)
	{

		$sql = " DELETE FROM filmes WHERE codigo='$codigo' ";
		$this->conexao->executarQuery($sql);

	}

	public function atualizarFilme($filme)
	{


		$titulo 	= $filme->getTitulo();
		$codigo 	= $filme->getCodigo();
		$sinopse 	= $filme->getSinopse();
		$quantidade = $filme->getQuantidade();
		$trailer 	= $filme->getTrailer();



		$sql = "UPDATE filmes SET titulo='$titulo',sinopse='$sinopse',
		quantidade='$quantidade',trailer='$trailer' WHERE codigo = '$codigo' ";

		// echo $sql;
		// die();
		$this->conexao->executarQuery($sql);

	}



	public function buscarFilme($codigo)
	{
		$linha = $this->conexao->obtemPrimeiroRegistroQuery("SELECT * FROM FILMES WHERE codigo='$codigo' ");

		$filme = new Filme(
			$linha['titulo'],
			$linha['codigo'],
			$linha['sinopse'],
			$linha['quantidade'],
			$linha['trailer']);

		return $filme;
	}

	public function getListaFilmes()
	{
		$listagem = $this->conexao->executarQuery("SELECT * FROM filmes");

		$arrayFilmes = array();

		while( $linha = mysqli_fetch_array($listagem)){
			$filme = new Filme(
				$linha['titulo'],
				$linha['codigo'],
				$linha['sinopse'],
				$linha['quantidade'],
				$linha['trailer']);
			array_push($arrayFilmes, $filme);
		}

			return $arrayFilmes;
	}

}

	$repositorio = new RepositorioFilmesMySQL();

?>