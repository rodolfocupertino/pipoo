<?php 

  include 'header.php';

  require 'repositorio_filmes.php';

  $filmes = $repositorio->getListaFilmes();

  $destino = 'incluir_filme.php';

  if (isset($_GET['codigo']) ) {
      $codigo = $_GET['codigo'];

      $filme = $repositorio->buscarFilme($codigo);

      $destino = "alterar_filme.php";
      $oculto = '<input type="hidden" name="codigo" value="'.$codigo.'" /> ';
  }

?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastrar Filme
                </h1>
            </div>
            <p>
              <!-- <a href="filme.php"><button type="button" class="btn btn-primary btn-lg">NOVO</button></a> -->
            </p>
            <hr>

                <?php if ( !empty($m) ) { ?>
                    <div class="alert alert-success" role="alert"><?=$m;?></div>
                <?php } ?>

            <div class="col-md-8">
            <p>
              <strong>Inserir:</strong><br>
                  <form name="frmAluno" method="post" action="<?=$destino;?>">
                    
                    <input type="hidden" value="<?=$a;?>" name="a">
                    <?= @$oculto;?>

                  <div class="form-group">
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<? echo isset($filme)?$filme->getTitulo():"";?>" placeholder="Título">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="sinopse" name="sinopse" value="<? echo isset($filme)?$filme->getSinopse():"";?>" placeholder="Sinopse">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="quantidade" name="quantidade" value="<? echo isset($filme)?$filme->getQuantidade():"";?>" placeholder="Quantidade">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="trailer" name="trailer" value="<? echo isset($filme)?$filme->getTrailer():"";?>" placeholder="Trailer">
                  </div>
                

                  <button type="submit" class="btn btn-default">SALVAR</button>
                </form>
              
            </p>
            </div>
            <div class="col-md-3">
            
            </div>
        </div>

        <div class="row">

            
            <div class="table-responsive">
            <hr>
            <h2> Filmes Cadastrados</h2>
              <table class="table">
                <thead>
                    <tr>
                      <th>Filme</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

<? 

    while($filmeTemporario = array_shift($filmes)) {
?>  
                    <tr>

                      <td><?=$filmeTemporario->getTitulo();?></td>
                      <td class="center">

                            <a href="filmes.php?codigo=<?=$filmeTemporario->getCodigo();?>" class="btn btn-default">Alterar</a>
                            
                            <a href="excluir_filme.php?codigo=<?=$filmeTemporario->getCodigo();?>" class="btn btn-danger">Excluir</a>

                      </td>
                    </tr>

<?php } ?>
                  </tbody>
                </table>
            </div>



        </div>
        <!-- /.row -->


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; </p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
