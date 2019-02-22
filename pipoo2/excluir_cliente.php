<?php

	require 'repositorio_clientes.php';

	$repositorio->removerCliente($_REQUEST['codigo']);

	header('Location: clientes.php');
	exit;

?>