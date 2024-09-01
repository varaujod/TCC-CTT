<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>

<body>
    <link rel="stylesheet" href="/assets/css/admin/cadastro.css">

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

        <?php if (session()->has("validacao")) : ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <?= session("validacao")->listErrors() ?>
            </div>
        <?php endif; ?>

        <div class="row">

            <div class="col-2">
                <div class="bloco-esquerdo">
                    <img src="/img/cadastro.svg" class="img-cadastro img-fluid">
                </div>
            </div>


            <div class="col-10">

                <form class="form-cad" <?= form_open(base_url("/admin/cadastro/salvar")) ?> <h2>Cadastro de Empresas</h2>

                    <div class="mb-1 mt-3 w-75">
                        <label for="nome" class="form-label">Nome Empresa</label>
                        <input type="text" class="form-control inp" id="nome" name="nome">
                    </div>

                    <div class="w-75">
                        <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="text" class="form-control inp" id="cnpj" name="cnpj">
                    </div>
                    <div class=" w-75">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control inp" id="endereco" name="endereco">
                    </div>
                    <div class="w-75">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control inp" id="email" name="email">
                    </div>
                    <div class="w-75">
                        <label for="message-text" class="form-label">Senha Para Acesso</label>
                        <input type="password" class="form-control inp" id="senha" name="senha">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nivel</label>
                        <select name="nivel" id="nivel">
                            <option value="2">Comum</option>
                        </select>
                    </div>

                    <div class="btn mt-1 mb-3 w-50">
                        <button type="submit" class="btn btn-secondary mt-5 w-25">Cadastrar</button>

                    </div>

                    <div class="selector mt-2 mb-2 w-50">
                        <button class="btn-cat btn btn-secondary "><a class="link" href="cadastro/categoria">+</a></button>
                        <select name="fkcategoria" id="fkcategoria" class="form-select">
                            <?php foreach ($categorias as $categoria) : ?>
                                <option value="<?= $categoria["codcategoria"] ?>"> <?= esc($categoria["nomecategoria"]) ?>
                                </option>
                            <?php endforeach; ?>
                    </div>
            </div <?= form_close() ?>>

        </div>

</body>

<?php $this->endSection() ?>