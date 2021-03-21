
<?php

  //chamados
  $lista_chamados = array();

  

  //Abrir o arquivo 
  $arquivo = fopen('chamados.hd', 'r');

  //enquanto houver registros ou linhas
  while(!feof($arquivo)){
    $registro = fgets($arquivo);
    $lista_chamados[] = $registro;
    
       
  }

  


  fclose($arquivo)

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
            

        
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title">3</h5>
                  <h6 class="card-subtitle mb-2 text-muted">3</h6>
                  <p class="card-text"> 3</p>
                </div>
              </div>
            
              
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