<?php

	/**
	*  Filme
	*/
	class Cliente
	{
		private $nome;
		private $codigo;
		private $cpf;
		private $endereco;
		private $data_cadastro;
		private $saldo_devedor;
		private $situacao;
		
		function __construct($nome,$codigo,$cpf,$endereco,$data_cadastro,$saldo_devedor,$situacao)
		{
			$this->nome 			= $nome;
			$this->codigo 			= $codigo;
			$this->cpf 				= $cpf;
			$this->endereco 		= $endereco;
			$this->data_cadastro 	= $data_cadastro;
			$this->saldo_devedor 	= $saldo_devedor;
			$this->situacao 		= $situacao;
		}

		public function setNome($nome)
		{
			$this->nome =  $nome;
		}

		public function getNome()
		{
			return $this->nome;
		}


		public function setCodigo($codigo)
		{
			$this->codigo =  $codigo;
		}

		public function getCodigo()
		{
			return $this->codigo;
		}


		public function setCPF($sionopse)
		{
			$this->cpf =  $sionopse;
		}

		public function getCPF()
		{
			return $this->cpf;
		}


		public function setEndereco($endereco)
		{
			$this->endereco =  $endereco;
		}

		public function getEndereco()
		{
			return $this->endereco;
		}


		public function setData_cadastro($data_cadastro)
		{
			$this->data_cadastro =  $data_cadastro;
		}

		public function getData_cadastro()
		{
			return $this->data_cadastro;
		}

		public function setSaldo_devedor($saldo_devedor)
		{
			$this->saldo_devedor =  $saldo_devedor;
		}

		public function getSaldo_devedor()
		{
			return $this->saldo_devedor;
		}

		public function setSituacao($situacao)
		{
			$this->situacao =  $situacao;
		}
		public function getSituacao()
		{
			return $this->situacao;
		}


	}