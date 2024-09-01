<?php $this->extend('template-cliente')?>

<?php $this->section('conteudo1') ?>

  <div class="card-group position-absolute top-50 start-50 translate-middle h-25 gap-2">
    
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor"
          class="bi bi-egg position-absolute top-50 start-50 translate-middle" viewBox="0 0 16 16">
          <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
        </svg>
        <a href="cliente/doc_archive/<?= session("codadmin")?>"
          class="btn btn-success position-absolute top-100 start-50 translate-middle btn-empresas">Acompanhamento de Documentos</a>
      </div>
    </div>

    <div class="card" style="width: 18rem;">
      <div class="card-body">
        
      <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" fill="currentColor" class="bi bi-egg position-absolute top-50 start-50 translate-middle" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
        <a href="cliente/cadastro_func/<?= session("codadmin")?>"
          class="btn btn-success position-absolute top-100 start-50 translate-middle btn-empresas">Cadastrar Funcionario</a>
      </div>
    </div>

  </div>
</body>
<?php $this->endSection()?>