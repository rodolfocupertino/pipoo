<?php

	require 'repositorio_filmes.php';

	$filmeRecebido = new Filme(
			$_REQUEST['titulo'],
			null,
			$_REQUEST['sinopse'],
			$_REQUEST['quantidade'],
			$_REQUEST['trailer']
		);

	$repositorio->cadastrarFilme($filmeRecebido);

	header('Location: filmes.php');
	exit;


?>