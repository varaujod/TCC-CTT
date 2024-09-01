<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>
<link rel="stylesheet" href="/assets/css/admin/documentos.css">

<div class="box-esquerda">

<div class="titulo-esq"><h3>Historico</h3></div>

  <ul class="list-group w-75">

  <li class="list-group-item">
    <button type="button" class="lista">
    <a class="lista" href="/admin/consultar/documentos-ano/<?= $id ?>/2023">2023</a>
  </button></li>

  <li class="list-group-item"><button type="button" class="lista">
  <a class="lista" href="/admin/consultar/documentos-ano/<?= $id?>/2022">2022</a>
  </button></li>

  <li class="list-group-item"><button type="button" class="lista">
  <a class="lista" href="/admin/consultar/documentos-ano/<?= $id ?>/2021">2021</a>
  </button></li>

  <li class="list-group-item"><button type="button" class="lista">
  <a class="lista" href="/admin/consultar/documentos-ano/<?= $id ?>/2020">2020</a>
  </button></li>

  <li class="list-group-item"><button type="button"class="lista">
    <a class="lista" href="/admin/consultar/documentos-ano/<?= $id ?>/2019">2019</a>
  </button></li>

  </ul>

</div>

<div class="tabela-emp">

<button type="button" class="funcionarios btn btn-warning">
        <a href="/admin/consultar/lista-funcionarios/<?= $id?>">Funcionarios</a>
</button>

<button type="button" class="inserir btn btn-warning">
        <a href="/admin/consultar/cadastro/inserir/<?= $id ?>">Inserir Documentos</a>
  </button>

<div class="titulo"><h1>Documentos </h1></div>
<table class="tabela table w-75 table-hover" >
  <thead class="table-dark">
    <tr>
      <th scope="col">Documento</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data Inclusão</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($this->data["documentos"] as $documento): ?>
  <tr>

      <th scope="row"><a href="<?= base_url("/uploads/laudos/".$documento->laudo.".pdf") ?>" target="_blank"><img src="/img/icon/baixar.svg" alt=""></th>
      <td><?= $documento->descricao?></td>
      <td><?= $documento->dataup?></td>
      <td>
          <a href="javascript:remover(<?= $documento->codrequerimento ?>)"><img class="lixo" src="/img/trash.svg"></a>
      </td>

    </tr>
    <?php endforeach; ?>

  </tbody>
</table>

</div>
<?php $this->endSection() ?>