<?php  ?>
<?php

//array de chamados

$chamados = array();
//http://php.net/manual/pt_BR/function.fopen.php
//abrir arquivo.hd
$arquivo = fopen('arquivo.txt', 'r');

//enquato houverem registros (linhas) a serem recuperados
while (!feof($arquivo)) { //testa pelo fim do arquivo
  //linhas
  $registro = fgets($arquivo); //recupera a linha
  $chamados[] = $registro;
}

//fechando o arquivo.hd



//fclose($arquivo);


?>
<html>

<head>

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">

            <? foreach ($chamados as $chamado) { ?>

              <?
              $chamado_dados = explode('#', $chamado);

              if (count($chamado_dados) < 3) {
                continue;
              }
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">Título do chamado...</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                  <p class="card-text">Descrição do chamado...</p>

                </div>
              </div>

            <? } ?>

            <div class="row mt-5">
              <div class="col-6">
                <button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php  ?>