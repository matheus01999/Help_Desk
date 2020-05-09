<?php  ?>
<html>

<head>
  <meta charset="utf-8" />
  <title> Help Desk :)</title>

  <script>
    function requisitarPagina(url) {

      document.getElementById('conteudo').innerHTML=''

      //incluir o gif loading na pagina
      if(!document.getElementById('loading')){
        let imgLoading = document.createElement('img')
        imgLoading.id = 'loading'
        imgLoading.src ='img/loading.gif'
        imgLoading.className = 'rounded-circle mx-auto d-block'

        document.getElementById('conteudo').appendChild(imgLoading)
      }
      let ajax = new XMLHttpRequest();

      //Metodo ajax.open responsael por configurar a url requisitada
      ajax.open('GET', url)

      //
      ajax.onreadystatechange = () => {
        if (ajax.readyState == 4 && ajax.status == 200){
          document.getElementById('conteudo').innerHTML = ajax.responseText
        }

        if(ajax.readyState == 4 && ajax.status == 404){
          document.getElementById('conteudo').innerHTML = 'tente novamnete mais tarde'
        }
      }

      ajax.send()
    }
  </script>

  <style>
    .card-home {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/homepage">
      <img src="img/form_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Help Desk
    </a>
    <a class="navbar-brand" href="/sair">
      <img src="img/exit.png" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>
  </nav>



  <!-- REQUISIÇOES AJAX -->


  <div class="container">
    <div class="row">

      <div class="card-home">
        <div class="card">
          <div class="card-header">
            Menu 
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-2 d-flex justify-content-center">
                <a href="#" onclick="requisitarPagina('/newchamado')"> 
                  <img src="img/form_newchamado2.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
              <a href="#" onclick="requisitarPagina('/consult_chamado')"> 
                  <img src="img/form_consult_chamado.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
              <a href="#" onclick="requisitarPagina('/adduser')"> 
                  <img src="img/form_adduser.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
              <a href="#" onclick="requisitarPagina('/newdevice')"> 
                  <img src="img/form_newdevice.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
              <a href="#" onclick="requisitarPagina('/newdash')"> 
                  <img src="img/form_dash.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
              <a href="#" onclick="requisitarPagina('/newconfig')"> 
                  <img src="img/form_config.png" width="70" height="70">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="conteudo"></div>
      </div>
    </div>
  </div>

  <!-- 
  <div class="container">
    <div class="row">

      <div class="card-home">
        <div class="card">
          <div class="card-header">
            Menu
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-2 d-flex justify-content-center">
                <a href="/newchamado">
                  <img src="img/form_newchamado2.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
                <a href="/consult_chamado">
                  <img src="img/form_consult_chamado.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
                <a href="/adduser">
                  <img src="img/form_adduser.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
                <a href="/consult_chamado">
                  <img src="img/form_newdevice.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
                <a href="/consult_chamado">
                  <img src="img/form_dash.png" width="70" height="70">
                </a>
              </div>
              <div class="col-2 d-flex justify-content-center">
                <a href="/consult_chamado">
                  <img src="img/form_config.png" width="70" height="70">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  -->
</body>

</html>
<?php  ?>