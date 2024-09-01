<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="icon" href="img/ctt-logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CTT - Centro de Treinamento de Tatui</title>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500;700&display=swap" rel="stylesheet">

  <script src="https://unpkg.com/phosphor-icons"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="/assets/css/home.css">

  <script src="app.js" defer></script>

</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bottom-5" data-bs-theme="light" style="background-color: #4d5f0d;">
    <div class="container-md">
      <a class="navbar-brand" href="/">
        <img src="img/ctt-logo.png" alt="Logo" class="d-inline-block align-text-center imga">
        CTT
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading1" onmousedown="autoScrollTo('scrollspyHeading1')">Quem Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading2">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading3">Contato</a>
          </li>
          <li class="nav-item"></li>
          <a class="nav-link" href="/login">Faça Login</a>
          </li>
        </ul>

        <span class="nav-item text-anima">
          <strong>Juntos pelo Melhor da sua Empresa!</strong>
        </span>
      </div>
    </div>
  </nav>
  <!-- main -->


  <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

  <div style="width: 100%; height: 1rem;">
  <div class="mw-100" style="width: 100%;">
<div class="carousel-item active">
      <img src="/img/fundo-ctt1.jpg" class="inicioimg d-block p-3" alt="...">
      <div class=" carousel-caption d-none d-md-block">
        <h1>Segurança</h1>
        <p>A CTT ajuda sua empresa a ter mais segurança para os funcionarios</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/fundo-ctt2.jpg" class="inicioimg d-block p-3" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Confiabilidade</h2>
        <p>A CTT te dá o conforto de nossos serviços para você e sua empresa!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/inicio.jpg" class="inicioimg d-block p-3" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Experiente no mercado!</h1>
        <p>A CTT dá todos os serviços, após nos contratar, contrate-nos!</p>
      </div>
    </div>
</div>
  </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <br>

  <div id="scrollspyHeading1">
    <br>
    <br>
    <br>
    <br>

    <h1 class="d-flex justify-content-center">Quem Somos?</h1>

    <h3 class="p-5 lh-lg">A CTT é uma empresa especializada em fornecer serviços de visitas técnicas e laudos da segurança do trabalho para empresas de diversos segmentos. Nossa equipe de técnicos altamente capacitados realiza visitas aos negócios dos nossos clientes para solucionar ou monitorar problemas relacionados à segurança do trabalho, verificando riscos e documentando todas as informações necessárias para a elaboração de laudos técnicos seguindo as normas vigentes.
<br><br>
Além disso, oferecemos serviços de criação de laudos, elaboração do LTCAT para a Previdência Social e inserção do Sistema SST (E-social), perícias técnicas como assistente em perícias técnicas/trabalhistas e programa de agendamento junto às clínicas conveniadas/médico do trabalho. Também prestamos assessoria em segurança e medicina do trabalho para garantir que nossos clientes estejam sempre em conformidade com as normas de segurança e saúde ocupacional. 
<br><br>
Nosso compromisso é oferecer serviços de alta qualidade e personalizados para atender às necessidades específicas de cada cliente, sempre com transparência e ética em nossas práticas. Acreditamos que a segurança do trabalho é uma questão essencial para a saúde e bem-estar dos trabalhadores, e estamos comprometidos em ajudar nossos clientes a manterem um ambiente de trabalho seguro e saudável.</h3>,
  </div>

  <div id="scrollspyHeading2">
    <br>
    <br>
    <br>
    <br>
    <h1 class="d-flex ms-5">Nossos Serviços</h1>

    <br>
    <br>

    <!-- <h3 class="p-5">A CTT fornece Serviço a empresas de visitas técnicas e laudos da segurança do trabalho, onde clientes entram em contato para que possa ser feito um agendamento a visita do técnico ao negócio, a visita é realizada para solucionar ou monitorar problemas relacionados a segurança do trabalho, que se compreendem de verificação de riscos, envio de documentos a receita federal a respeito de toda parte de risco no exercício do trabalho para a possível aposentadoria, elaboração de laudos técnicos seguindo as normas. Trabalhamos com Criação de Laudo</h3>,  -->

    <div class="card mb-5 ms-3 me-3" style="max-width: 1540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/consult.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Assessoria em Segurança e Medicina do Trabalho</h5>
            <p class="card-text lh-base">
            A Assessoria em Segurança e Medicina do Trabalho é um serviço essencial para adequar empresas às normas do Ministério do Trabalho no que diz respeito à segurança e saúde dos trabalhadores. O principal objetivo da consultoria é 
            promover práticas responsáveis e legalmente determinadas para evitar doenças e acidentes ocasionados por tarefas na empresa.
            Com um ambiente de trabalho adequado, os funcionários realizam suas tarefas com melhor desempenho e ganham em qualidade de vida. Para a empresa, é fundamental garantir a proteção de seus funcionários e a regularização da organização.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-5 ms-3 me-3" style="max-width: 1540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/laudo.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Criação do Laudo Técnico das Condições Ambientais de Trabalho (LTCAT)  </h5>
            <p class="card-text">
            Laudo Técnico das Condições Ambientais de Trabalho (LTCAT) é um documento que atesta a exposição do funcionário a agentes capazes de danificar sua saúde e integridade física.
            Exigido pelo INSS, o LTCAT deve ser feito sempre que houver alguma atividade que submeta o colaborador a tais riscos. 
            O laudo serve para indicar as condições ambientais de trabalho, 
            na intenção de determinar se o empregado tem ou não direito a uma aposentadoria especial.
            Todas as empresas devem fazer o LTCAT, que é regulamentado pela Previdência Social 
            (e não pelo Ministério do Trabalho, como no caso do PCMSO, por exemplo). 
            É adotado pelo INSS apenas como forma de documentar o ambiente,
            indicando aos órgãos responsáveis quando o benefício deve ser concedido.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-5 ms-3 me-3" style="max-width: 1540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/esocial.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Inserção do Sistema SST (E-Social)</h5>
            <p class="card-text">
            SST é a sigla para Saúde e Segurança do Trabalho, e diz respeito a uma série de normas e procedimentos exigidos legalmente aos funcionários e empresas para reduzir acidentes ou doenças ocupacionais.
            O eSocial é uma plataforma do Governo Federal que centraliza as informações trabalhistas, previdenciárias e tributárias do empregador em relação aos seus empregados.
            Dessa forma, é por meio dele que as empresas devem mandar os documentos necessários para cumprir com a SST. Neste sistema, o governo fornece o manual, leiaute e tabelas referentes aos grupos, eventos e prazos.
            A informação deve ser prestada imediatamente. Isso faz com o que o governo tenha em mãos todos os dados a respeito de como a empresa está lidando com a segurança e saúde dos seus funcionários.

Por isso, para manter a empresa em regularidade com as exigências legislativas, é importante certificar que todas as informações estejam atualizadas.
            </p>
          </div>
        </div>
      </div>
    </div>



    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" id="scrollspyHeading3" style="background-color: #4d5f0d;">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>Siga Nossas Redes Sociais!</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Centro de Treinamento de Tatuí
              </h6>
              <p>
              Nosso compromisso é oferecer serviços de alta qualidade e personalizados para atender às necessidades específicas de cada cliente, sempre com transparência e ética em nossas práticas. Acreditamos que a segurança do trabalho é uma questão essencial para a saúde e bem-estar dos trabalhadores, e estamos comprometidos em ajudar nossos clientes a manterem um ambiente de trabalho seguro e saudável.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Opções Secundárias
              </h6>
              <p>
                <a href="https://solucoes.receita.fazenda.gov.br/Servicos/cnpjreva/cnpjreva_solicitacao.asp" class="text-reset">Somos Reais? Entre Aqui</a>
              </p>
              <p>
                <a href="/login" class="text-reset">Admin Version</a>
              </p>
              <p>
                <a href="politica-priv-site.html" class="text-reset">Politica de Privacidade do Site</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Forúm Publico</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Outros Links
              </h6>
              <p>
                <a class="text-reset" href="https://www.gov.br/pt-br">Gov.br</a>
              </p>
              <p>
                <a href="login.html" class="text-reset">Requermento de Laudo</a>
              </p>
              <p>
                <a href="sac.html" class="text-reset">Perguntas Frequentes</a>
              </p>
              <p>
                <a href="https://contate.me/centrotreinamentotatui" class="text-reset">Converse por Whatsapp</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
              <p><i class="fas fa-home me-3"></i>Rua Prefeito Antônio Tricta Junior, 777, Doutor Laurindo - Tatuí/SP</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                marcelocoelho1963@gmail.com
              </p>
              <p><i class="fas fa-phone me-3"></i>+55 15 99604 - 1196</p>
              <p><i class="fas fa-print me-3"></i>+55 15 3259 - 2428</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <span class="text-reset fw-bold" href="https://mdbootstrap.com/">Centro de Treinamento de Tatuí - Desenvolvido em TCC de Desenvolvimento de Sistemas da Etec Sales Gomes (Vinicius Araújo Domingues e Lucas Ferreira Fernandes)</span>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    </nav>
</body>

</html>
