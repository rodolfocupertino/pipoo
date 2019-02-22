<?php

	require 'repositorio_clientes.php';

	$clienteRecebido = new Cliente(
			$_REQUEST['nome'],
			$_REQUEST['codigo'],
			$_REQUEST['cpf'],
			$_REQUEST['endereco'],
			$_REQUEST['data_cadastro'],
			$_REQUEST['saldo_devedor'],
			$_REQUEST['situacao']
		);

	$repositorio->atualizarCliente($clienteRecebido);

	header('Location: clientes.php');
	exit;

?>