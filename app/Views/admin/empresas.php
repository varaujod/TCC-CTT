<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>

<link rel="stylesheet" href="/assets/css/admin/empresas.css">
<table class="table table-hover w-75 shadow p-3 mb-5 bg-body-tertiary rounded">
  <thead>
    <tr>
      <th scope="col" class="bg-dark text-light">Codigo</th>
      <th scope="col" class="bg-dark text-light">Nome</th>
      <th scope="col" class="bg-dark text-light">Endereço</th>
      <th scope="col" class="bg-dark text-light">CNPJ</th>
      <th scope="col" class="bg-dark text-light">Excluir</th>
    </tr>
  </thead>
  
  <div class="pesquisa">
  <img src="/img/icon/parceiras.svg"><h1 class="">Empresas</h1>
  <h5 class="texto">Empresas Parceiras</h5>
    <form class="pesquisa" role="search"><?= form_open(base_url("/admin/empresas/pesquisar")) ?>
          <input class="input-pes" type="search" name="buscar "placeholder="Pesquisar" aria-label="Search">
          <button class="btn-p" type="submit"><img src="/img/icon/pesquisa.svg" alt=""></button>
     </div <?= form_close() ?>>
    
  </div>
  
  <tbody class="table-group-divider">

    <?php foreach ($this->data["lista"] as $empresa): ?>
      <tr>
        <th scope="row">
          <?= $empresa->codadmin ?>
        </th>
        <td class="hoje">
        <?php foreach ($lista as $empresas) : ?>
          <a href="documentos/<?= $empresa->codadmin ?>"
        <?php endforeach ?>
          <a class="nome">
            <?= $empresa->nome ?>
          </a></td>
        <td>
          <?= $empresa->endereco ?>
        </td>
        <td>
          <?= $empresa->cnpj ?>
        </td>
        <td>
          <a href="javascript:remover(<?= $empresa->codadmin ?>)"><img class="lixo" src="/img/trash.svg"></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="modal fade" id="confirmacao">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente deletar essa Empresa ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-danger" id="link-exclusao">Sim</a>
                </div>
            </div>
        </div>
    </div>

<script>
        function remover(id) {
            const link = document.getElementById("link-exclusao");
            const modalExclusao =
                new bootstrap.Modal(document.getElementById("confirmacao"), {});

            link.setAttribute("href", `/admin/empresas/remover/${id}`);

            modalExclusao.show();
        }
    </script>

<?php $this->endSection() ?>