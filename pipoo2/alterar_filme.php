<?php

	require 'repositorio_filmes.php';

	$filmeRecebido = new Filme(
			$_REQUEST['titulo'],
			$_REQUEST['codigo'],
			$_REQUEST['sinopse'],
			$_REQUEST['quantidade'],
			$_REQUEST['trailer']
		);

	$repositorio->atualizarFilme($filmeRecebido);

	header('Location: filmes.php');
	exit;

?>