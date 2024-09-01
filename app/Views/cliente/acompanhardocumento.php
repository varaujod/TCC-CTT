<?php $this->extend('template-cliente') ?>

<?php $this->section('conteudo1') ?>

<?php

$codrequerimento = '';
$statusrequerimento = 0;
$datarequerimento = '';

if (session()->has("requerimento")) {
    $requerimento = session("requerimento");
}

if (isset($requerimento)) {
    $codrequerimento = $requerimento["codrequerimento"];
    $statusrequerimento = $requerimento["statusrequerimento"];
    $datarequerimento = $requerimento["datarequerimento"];
}

?>


<body>
    <main>
        <div class="container">
            <br><br>
            <h1>Acompanhamento de Documentos Solicitados</h1>

            <?php if (session()->has("tipo")) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                <div class="alert alert-<?= session("tipo") ?> mt-2 d-flex align-items-center" role="alert">
                    <?= session("icon") ?>
                    <div>
                        <?= session("mensagem") ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                <a type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Solicitar Documento</a>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="titulo-assunto">Novo Pedido</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?= form_open(base_url("/cliente/enviar")) ?>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Assunto:</label>
                                    <input type="text" class="form-control" id="texto" name="assunto">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name">Data do Pedido</label>
                                    <input type="date" data-provide="datepicker" name="datarequerimento" id="datarequerimento">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Descrição:</label>
                                    <textarea class="form-control" id="texto" name="texto"></textarea>
                                </div>

                                <input type="hidden" class="form-control" id="fkempresa" name="fkempresa" value="<?= session("codadmin") ?>">

                            </div>
                            <div class="modal-footer">

                                <input type="hidden" class="form-control" id="status" name="statusrequerimento" maxlength="2" value="0">

                                <button type="submit" class="btn btn-primary">Enviar Solicitação do Pedido</button>
                            </div>

                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <br><br>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requerimentos as $requerimento) : ?>
                        <tr>
                            <td><?= esc($requerimento["codrequerimento"]) ?></td>
                            <td><?= esc($requerimento["assunto"]) ?></td>
                            <td><?= esc($requerimento["datafinal"]) ?></td>

                            <?php if ($requerimento["statusrequerimento"] == 0) : ?>
                                <td>
                                    <p class="p1">Em Analise</p>
                                </td>
                            <?php endif ?>

                            <?php if ($requerimento["statusrequerimento"] == 1) : ?>
                                <td>
                                    <p class="p2">Em processamento</p>
                                </td>
                                <p><?= session("statusandamento") ?></p>
                            <?php endif ?>

                            <?php if ($requerimento["statusrequerimento"] == 2) : ?>
                                <td>
                                    <p class="p3">Concluido</p>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#doc">
                                        <i class="ph ph-printer"></i>
                                    </button>
                                </td>
                            <?php endif ?>

                            <!-- Modal -->
                            <div class="modal fade" id="doc" tabindex="-1" aria-labelledby="doc" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Recebimento de Documento</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="fs-5">Sua Solicitação foi concluida com Sucesso :)</h2>
                                            <p>Caro cliente, acesse <a href="<?= base_url("/uploads/laudos/".$requerimento["laudo"].".pdf") ?>" target="_blank">Link</a> para receber o seu arquivo! Obrigado pela sua confiança.</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-success">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
        </td>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
    </main>

</body>

<?php $this->endSection() ?>