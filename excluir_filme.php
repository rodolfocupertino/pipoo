<?php

	require 'repositorio_filmes.php';

	$repositorio->removerFilme($_REQUEST['codigo']);

	header('Location: filmes.php');
	exit;

?>