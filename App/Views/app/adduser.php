<?php  ?>
<html>

<head>
    
    <style>
        .card-login {
            padding: 30px 0 0 0;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="card-login">
                <div class="card">
                    <div class="card-header">
                        Adicionar Usuario
                    </div>
                    <div class="card-body">
                        <form  method="POST">
                            <div class="form-group">
                                <input type="nome" name="nome" class="form-control" placeholder="Nome Completo">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha">
                            </div>
                            <button class="btn btn-lg btn-info btn-block" href='/salvar' type="submit">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<?php  ?>