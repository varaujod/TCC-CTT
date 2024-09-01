<?php $this->extend('template') ?>

<?php $this->section("area-modal") ?>
<?php foreach ($ordems as $ordem) : ?>
<div class="modal fade" id="exampleModal_<?= $ordem["codservico"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Descrição Serviço</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Resumo:</label>
              <textarea class="form-control" id="message-text"><?= $ordem["texto"] ?></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<?php endforeach; ?>

<div class="modal fade" id="confirmacao">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente deletar essa Agendamento ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-danger" id="link-exclusao">Sim</a>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>

<?php $this->section('conteudo') ?>
<link rel="stylesheet" href="/assets/css/admin/agendamento.css">
<div class="row row-cols-1 row-cols-md-3 w-100"style="
    margin-top: 100px;">
  <?php foreach ($ordems as $ordem) : ?>
    <div class="col">
      <div class="cartao d-flex justify-content-center">
        <div class="card mb-5">
          <div class="card-body w-100">
          <a href="javascript:remover(<?=$ordem["codservico"] ?>)"><img class="lixo" src="/img/trash.svg"></a>
            <div class="data w-100" type="date">Data Emissão <?= $ordem["ord_dataemissao"] ?> <?= $ordem["valordata"] ?> </div> 
            <h5 class="card-title"><?= $ordem["ord_nome"] ?></h5>
            <p class="card-text"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?= $ordem["codservico"]?>" data-bs-whatever="@getbootstrap">Descrição</button></p>
          </div>
        </div>
      </div>
      </div>
        <?php endforeach; ?>
    </div>

  <script>
    const exampleModal = document.getElementById('exampleModal')
    if (exampleModal) {
      exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = `Descrição do Serviço`
        modalBodyInput.value = recipient
      })
    }

    function remover(id) {
            const link = document.getElementById("link-exclusao");
            const modalExclusao =
                new bootstrap.Modal(document.getElementById("confirmacao"), {});

            link.setAttribute("href", `/admin/ordem/remover/${id}`);

            modalExclusao.show();
        }
  </script>
  <?php $this->endSection() ?>