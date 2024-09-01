<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="icon" href="/img/ctt-logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTT - Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?= $this->renderSection('css_adicional') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500;700&display=swap" rel="stylesheet">

    <style>
        header {
            padding: 0;
            background-color: #4d5f0d;
        }

        body {
            font-family: 'Exo 2', sans-serif;
            margin: 0;
            padding: 0;
        }

        .imga {
            width: 3rem;
            height: 3rem;
        }

        .texto {
            color: #ffff;
        }

        .div-simples {
            background-color: black;
            padding: 0.35rem;
            display: flex;
            margin-left: 1rem;
            border: none;
            border-radius: 1rem;
        }

        .p1{
            color:red;
        }
        .p2{
            color:orange;
        }
        .p3{
            color:green;
        }
        .div-simples:hover{
            background-color: black !important;
        }

        .naver{
            padding-top: 0.4rem;
        }
    </style>

</head>

<body>

    <?= $this->renderSection("area-modal-cliente") ?>

    <header>
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-xl">
                <a class="navbar-brand" href="/">
                    <img src="/img/ctt-logo.png" class="d-inline-block align-text-center imga">
                    CTT</a>
                <ul class="nav justify-content-center">
                    <li class="nav-item naver">
                        <a class="nav-link texto" href="/cliente">Inicio</a>
                    </li>
                    <li class="nav-item naver">
                        <a class="nav-link texto" href="/cliente/doc_archive/<?= session("codadmin")?>">Acompanhar Documento</a>
                    </li>
                    <li class="nav-item naver">
                        <a class="nav-link texto" href="/cliente/cadastro_func/<?= session("codadmin")?>">Cadastrar Funcionário</a>
                    </li>
                    <li class="nav-item button">
                        <a class="btn text-white div-simples" href="/cliente/sair" role="button">
                            <span class="nav-link texto">Olá, <?= session("nome") ?></span>
                            <span class="btn btn-danger texto" ><i class="ph ph-sign-out"></i></span>
                        </a>
                    </li>
            </div>
            <br>
            </ul>
            </div>
        </nav>

    </header>

    <main>
        <?= $this->renderSection('conteudo1') ?>
    </main>
</body>

</html>