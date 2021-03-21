<?php ?>
<head>
<style>
    .card-abrir-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>
<div class="card-abrir-chamado">
  <div class="card">
    <div class="card-header">
      Configuração
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">

        <div class="card-body">
            <div class="row">
              

              <div class="col-2 d-flex justify-content-center">
              <a href="#" onclick="requisitarPagina('/adduser')"> 
                  <img src="img/form_adduser.png" width="70" height="70">
                </a>
              </div>
          
            </div>
          </div>

          <form action="/register_chamado" method="POST">
            

            <div class="row mt-5">
              <div class="col-6">
                <button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button>
              </div>

              <div class="col-6">
                <button class="btn btn-lg btn-info btn-block" href="/homepage" type="submit">Salvar</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php ?>