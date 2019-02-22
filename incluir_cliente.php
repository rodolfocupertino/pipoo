<?php

	require 'repositorio_clientes.php';

	$clienteRecebido = new Cliente(
			$_REQUEST['nome'],
			null,
			$_REQUEST['cpf'],
			$_REQUEST['endereco'],
			$_REQUEST['data_cadastro'],
			$_REQUEST['saldo_devedor'],
			$_REQUEST['situacao']
		);

	$repositorio->cadastrarCliente($clienteRecebido);

	header('Location: clientes.php');
	exit;


?>