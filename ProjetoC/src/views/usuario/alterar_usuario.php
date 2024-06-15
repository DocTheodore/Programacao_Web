<!doctype html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {
        background-color: #2E2E2E; 
        color: #FFFFFF; 
      }
      .container {
        max-width: 600px; 
        margin-top: 50px; 
      }
      .form-control {
        background-color: #333333; 
        color: #FFFFFF; 
        border-color: #444444; 
      }
      .btn-primary {
        background-color: #0077CC; 
        border-color: #0077CC; 
      }
      .btn-primary:hover {
        background-color: #005580; 
        border-color: #005580; 
      }
    </style>
    <title>Alterar Usuario</title>
 </head>
 <body>
    <main class="container">
        <h3>Alterar Usuario</h3>
        <form action="/usuario/novo" method="post">
        <input type="hidden" name="id" value="<?=$resultado["id"]?>">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" value="<?=$resultado["nome"]?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="idade" class="form-label">Anos de Idade:</label>
                    <input type="number" name="idade" class="form-control" value="<?=$resultado["idade"]?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="pais" class="form-label">Pais de origem:</label>
                    <input type="text" name="pais" class="form-control" value="<?=$resultado["pais"]?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>