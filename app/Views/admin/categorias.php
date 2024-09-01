<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>

<body>

    <link rel="stylesheet" href="/assets/css/admin/categoria.css">
    
    <div class="container text-center">

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
    
        <div class="row">

            <div class="col-2">
                <div class="bloco-esquerdo"></div>
            </div>

            <div class="col-10">
                <form class="form-cad w-75" <?= form_open_multipart(base_url("/admin/categoria/salvar")) ?> <h2>Cadastro de Categorias</h2>
                    <div class="mb-3 w-75">
                        <label for="codcategoria" class="form-label">Cod Setor</label>
                        <input type="text" class="form-control inp" id="codcategoria" name="codcategoria" readonly>
                    </div>

                    <div class="mb-3 w-75">
                        <label for="nomecategoria" class="form-label">Nome</label>
                        <input type="text" class="form-control inp" id="nomecategoria" name="nomecategoria">
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept=".png, .jpg, .jpeg, .svg">
                    </div>

                    <button type="submit" class="btn btn-secondary mt-3 w-25">Cadastrar</button>

            </div <?= form_close() ?>>
        </div>

</body>

<?php $this->endSection() ?>