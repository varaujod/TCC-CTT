<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>
<?php

$codservico = '';

if (isset($empresa)) {
    $codservico = $empresa["codservico"];
}

?>

<link rel="stylesheet" href="/assets/css/admin/ordem.css">

<div class="main">
    
    <?php if (session()->has("tipo")) : ?>
        <div class="alert alert-<?= session("tipo") ?> mt-2 d-flex align-items-center" role="alert">
            <?= session("mensagem") ?>
        </div>
    <?php endif; ?>

    <div class="retangulo">
        <div class="img-carta"></div><img src="/img/icon/carta.svg">
        <h1>Ordem de Serviço</h1>

    </div>

    <container class="form ">

        <?= form_open(base_url("/admin/ordem/salvar")) ?> <div class="m-3 w-25">

            <div class="form-esquerdo">
                <div class="m-3  w-100">
                    <label for="" class="form-label mr-2">Ordem</label>
                    <input type="text" class="form-control" id="codservico" aria-describedby="emailHelp" readonly <?= esc($codservico) ?>>
                </div>

                <div class="m-3  w-100">
                    <label for="" class="form-label w-25">Empresa</label>
                    <select name="fkempresa" id="fkempresa" class="form-select">
                        <option value="0">Selecione a Empresa</option>
                        <?php foreach ($empresas as $empresa) : ?>
                            <option value="<?= $empresa->codadmin ?>"> <?= $empresa->nome ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="m-3 w-100">
                    <label for="dataemissao" class="form-label">Data Emissão</label>
                    <input type="date" class="form-control" id="dataemissao" name="dataemissao" aria-describedby="emailHelp">
                </div>

                <div class="m-3  w-100">
                    <label for="datafinal" class="form-label">Data Final</label>
                    <input type="date" class="form-control" id="datafinal" name="datafinal">
                </div>
            </div>

            <div class="form-direito ">
                <div class="mb-4 w-75">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                </div>

                <div class="mb-3 w-75">
                    <label for="texto" class="form-label">Descrição Ordem Serviço</label>
                    <textarea class="form-control" id="texto" rows="11" name="texto"></textarea>
                </div>
            </div>

            <button type="submit" class="btn-emitir btn btn-dark m-3 w-100">Emitir</button>

            </form <?= form_close() ?> <?php $this->endSection() ?></container>
        </div>