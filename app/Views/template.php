<!DOCTYPE html>
<html lang="pt-br">

<head>
<link rel="icon" href="/img/ctt-logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <link rel="stylesheet" href="/assets/css/admin/template.css">
  <title>CTT - Admin</title>
</head>

<body>

  <?= $this->renderSection("area-modal") ?>

  <header>
    <nav class="navbar bg-body-primary fixed-top barra">
      <div class="container-fluid">
        <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start menu" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a href="/admin/setores">CTT</a></h5><img class="logo" src="/img/logo.png">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body ">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">

    
              <div class="nav-item">
                <button class="btn-drop btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/img/icon/empresas.svg" alt=""> Empresas
                </button>
                <ul class="drop dropdown-menu">
                  <li class="p-0"><a class="btn-drop dropdown-item" href="/admin/setores"><img src="/img/build.svg">Empresas</a></li>
                  <li class="p-0"><a class="btn-drop dropdown-item pe-1" href="/admin/documentos/lista"><img src="/img/icon/document.svg">Requisição de Documentos</a></li>
                </ul>
              </div>

              <li class="nav-item">
                <a ria-current="page" href="/admin/ordem"><img src="/img/icon/emissao.svg" alt=""> Emissão O.S</a>
              </li>
              <li class="nav-item">
                <a aria-current="page" href="/admin/agendamento"><img src="/img/icon/agendamento.svg">
                  Agendamentos</a>
              </li>
              <li class="nav-item">
                <a ria-current="page" href="/admin/planejamento"> <img src="/img/icon/planejamento.svg" alt="">Planejamento</a>
              </li>
              <li class="nav-item">
                <a href="/admin/sair"> <img src="/img/icon/sair.svg" alt="">Sair</a>
              </li>
            </ul>
          </div>
        </div>
        <img src="/img/ctt-logo.png" class="d-inline-block align-text-center imga">
      </div>
    </nav>
  </header>

  <main>
    <?= $this->renderSection('conteudo') ?>
  </main>


</body>