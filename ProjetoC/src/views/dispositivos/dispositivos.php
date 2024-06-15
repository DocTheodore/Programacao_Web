<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dispositivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            background-color: #1b2838;
            color: #c7d5e0;
            font-family: 'Arial', sans-serif;
        }
        .navbar, .footer {
            background-color: #171a21;
            padding: 10px;
        }
        .navbar-brand, .footer-text {
            color: #c7d5e0;
            font-size: 1.5em;
        }
        .btn-steam {
            background-color: #5c7e10;
            color: white;
        }
        .btn-steam:hover {
            background-color: #4b650d;
        }
        .card-category {
            background-color: #2a475e;
            border: 1px solid #1b2838;
            margin-bottom: 20px;
        }
        .card-category .card-body {
            color: #c7d5e0;
        }
        .btn-primary, .btn-warning, .btn-danger {
            margin-right: 5px;
        }
        .btn-primary {
            background-color: #5c7e10;
            border-color: #5c7e10;
        }
        .btn-primary:hover {
            background-color: #4b650d;
            border-color: #4b650d;
        }
        .btn-warning {
            background-color: #e1a305;
            border-color: #e1a305;
        }
        .btn-warning:hover {
            background-color: #bf8c00;
            border-color: #bf8c00;
        }
        .btn-danger {
            background-color: #c14444;
            border-color: #c14444;
        }
        .btn-danger:hover {
            background-color: #a23535;
            border-color: #a23535;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">Dispositivos</a>
    </nav>

    <main class="container mt-4">
        <h1 class="mb-4">Dispositivos</h1>
        <a href="/dispositivos/inserir" class="btn btn-steam mb-3">Novo dispositivo</a>

        <p>
            <?php if(isset($mensagem)) : ?>
                <p style='background-color: #555; color: #eee; font-weight: bold; border: 2px solid #555; padding: 10px;'><?= $mensagem ?></p>
            <?php endif; ?>
        </p>        

        <div class="row">
        <table class="table table-striped table-hover" id="tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar todas as descrições da tabela Dispositivos -->
                <?php
                    while($c = $resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <tr>
                            <td><?=$c['nome']?></td>
                            <td><?=$c['quantidade']?></td>
                            <td>
                                <a href="/dispositivos/alterar/id/<?=$c["id"]?>" class="btn btn-warning">Alterar</a>
                                <a href="/dispositivos/excluir/id/<?=$c["id"]?>" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
    </main>

    <footer class="footer mt-4">
        <p class="footer-text text-center">© 2023 Thiago Moreira</p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#tabela', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
    </script>
</body>
</html>
