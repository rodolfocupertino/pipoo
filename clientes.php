<?php 

  include 'header.php';

  require 'repositorio_clientes.php';

  $clientes = $repositorio->getListaClientes($_GET['filtro']);

  $destino = 'incluir_cliente.php';

  if (isset($_GET['codigo']) ) {
      $codigo = $_GET['codigo'];

      $cliente = $repositorio->buscarCliente($codigo);

      $destino = "alterar_cliente.php";
      $oculto = '<input type="hidden" name="codigo" value="'.$codigo.'" /> ';
  }

# Função que ajuda a desenhar o controle HTML select
function combobox($arrDados, $valorSelecionado = null) {
    echo "<option></option>";
    foreach ($arrDados as $key => $value) {
        $selected = ($valorSelecionado == $key) ? "selected=\"selected\"" : null;
        echo "<option value=\"$key\"  $selected>$value</option>";
    }
}

$array_situacao = array(
    "Em atraso" => "Em atraso",
    "Em dia" => "Em dia",
);

?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastrar cliente
                </h1>
            </div>
            <p>
              <!-- <a href="cliente.php"><button type="button" class="btn btn-primary btn-lg">NOVO</button></a> -->
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
                    <input type="text" class="form-control" id="nome" name="nome" value="<? echo isset($cliente)?$cliente->getNome():"";?>" placeholder="Nome">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<? echo isset($cliente)?$cliente->getCPF():"";?>" placeholder="CPF">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<? echo isset($cliente)?$cliente->getendereco():"";?>" placeholder="endereco">
                  </div>
                
                  <div class="form-group">
                    <input type="text" class="form-control" id="data_cadastro" name="data_cadastro" value="<? echo isset($cliente)?$cliente->getData_cadastro():"";?>" placeholder="Data Cadastro">
                  </div>
                  
                  <div class="form-group">
                    <input type="text" class="form-control" id="saldo_devedor" name="saldo_devedor" value="<? echo isset($cliente)?$cliente->getSaldo_devedor():"";?>" placeholder="Saldo devedor">
                  </div>

                  <div class="form-group">
                    <select class="form-control" id="situacao" name="situacao">
                        <?php 
                          $aSituacao =  isset($cliente)?$cliente->getSituacao():"";
                          combobox($array_situacao, $aSituacao  );

                         ?>
                    </select>
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
            <h2> Clientes Cadastrados</h2>
            <div class="col-md-9">
            <p>Filtros:</p>
            <p> <a href="?filtro=">Todos</a> | <a href="?filtro=Em atraso"> Em Atraso</a> | <a href="?filtro=Em dia">Em Dia</a>
            </div>
              <table class="table">
                <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>

<? 

    while($clienteTemporario = array_shift($clientes)) {
?>  
                    <tr>

                      <td><?=$clienteTemporario->getNome();?></td>
                      <td class="center">

                            <a href="clientes.php?codigo=<?=$clienteTemporario->getCodigo();?>" class="btn btn-default">Alterar</a>
                            
                            <a href="excluir_cliente.php?codigo=<?=$clienteTemporario->getCodigo();?>" class="btn btn-danger">Excluir</a>

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
