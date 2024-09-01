<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="icon" href="img/ctt-logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <title>Login - CTT</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Exo 2', sans-serif;
        }

        body{
            background: linear-gradient(green, #c2f216);
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }

        .container {
            background-repeat: no-repeat;
            width: 70%;
            height: 70vh;
            margin-top: 5rem;
            margin-left: 14rem;
            border-radius: 1rem;
        }

        .login-entrar {
            width: 100%;
            height: 70vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: #c2f216;
            border-radius: 2rem;
            border-style: solid;
        }

        .col{
            width: 100%;
        }
        .imga {
            width: 5rem;
            height: 5rem;
        }
    </style>
</head>

<body class="p-3 border-0 ">
<div class="container">
        <div class="validacao mb-3">
        <?php if(session()->has("tipo")): ?>
                <div class="alert alert-<?= session("tipo") ?> mt-2 d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <?= session("mensagem") ?> 
                </div>
            <?php endif; ?>
                </div>
            <div class="login-entrar">
                    
            <div class="row">
                <div class="col-7">
                    <img src="/img/ctt-logo.png" alt="Logo" class="d-inline-block align-text-center imga"><br>
                    <h1>Login CTT</h1>
                    <br>
                </div>
            </div>

            <div class="col-5">
                <?= form_open(base_url("login/entrar")); ?>
            <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Password">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="senha" placeholder="Password">
                        <label for="senha">Senha de Acesso</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Entrar</button>

                    <?= form_close() ?>
            </div>
</body>

</html>