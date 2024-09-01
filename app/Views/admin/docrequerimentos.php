<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>

<?php

$codrequerimento = '';
$statusrequerimento = '';
$datarequerimento = '';

if (session()->has("requerimentos")) {
    $requerimento = session("requerimentos");
}

if (isset($requerimento)) {
    $codrequerimento = $requerimento["codrequerimento"];
    $statusrequerimento = $requerimento["statusrequerimento"];
    $datarequerimento = $requerimento["datarequerimento"];
}

?>


<link rel="stylesheet" href="/assets/css/admin/cadastro_doc.css">

<div class="container">
    
<?php if (session()->has("tipo")) : ?>
        <div class="alert alert-<?= session("tipo") ?> mt-2 d-flex align-items-center" role="alert">
            <?= session("mensagem") ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has("tipo2")) : ?>
        <div class="alert alert-<?= session("tipo2") ?> mt-2 d-flex align-items-center" role="alert">
            <?= session("mensagem") ?>
        </div>
    <?php endif; ?>

    <div class="conteudo">
        <h2 class="mx-auto p-2">Inserir Arquivos</h2>
        <?= form_open_multipart(base_url('/admin/consultar/requerimentos/inserir/')) ?>
        
            <div class="file mb-3">
                <label for="formFile" class="file-label form-label">Escolha o arquivo</label>
                <input class="file-control form-control" type="file" id="formFile" name="laudo" accept=".pdf">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label w-75">Descrição </label>
                <textarea class="form-control" id="descricao" rows="1" name="descricao"></textarea>
            </div>

            <input type="hidden" class="form-control" id="codrequerimento" name="codrequerimento" value="<?=$requerimento["codrequerimento"]?>">

            <label for="" class="form-label w-25">Empresa</label>
                    <select name="statusrequerimento" id="statusrequerimento" class="form-select">
                    <option value="<?= $requerimento["statusrequerimento"]?>">Analise</option>
                    <option value="2">Concluido</option>
            </select>

            <div class="mb-3 w-25 mx-auto p-2">
                <label for="dataup" class="form-label">Data</label>
                <input type="date" class="form-control" id="dataup" name="dataup">
            </div>

            <button type="submit" class="btn btn-success position-absolute bottom-0 start-50 translate-middle-x">Enviar</button>
            
        <?= form_close() ?>
    </div>
</div>

<?php $this->endSection() ?>