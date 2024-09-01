<?php $this->extend('template-cliente') ?>

<?php $this->section('css_adicional') ?>
<link rel="stylesheet" href="/assets/css/cliente/cadastro-func.css">

<?php $this->endSection() ?>

<?php $this->section('conteudo1') ?>

<?php

$codfuncionario = '';
$nome = '';
$cpf = 0;
$funcao = '';

if (session()->has("funcionario")) {
    $funcionario = session("funcionario");
}

if (isset($funcionario)) {
    $codfuncionario = $funcionario["codfuncionario"];
    $nome = $funcionario["nome"];
    $cpf = $funcionario["cpf"];
    $funcao = $produto["funcao"];
}

?>

<body>

    <main>
        <div class="layout">
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
            <?= form_open(base_url("/cliente/salvar/")) ?>
            <div class="row g-3">

                <div class="col-md-12">
                    <label for="nome" class="form-label">Nome do Funcionário</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="col-md-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf">
                </div>
                <div class="col-6">
                    <label for="datanasc" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" name="datanasc" id="datanasc">
                </div>
                <div class="col-md-6">
                    <label for="dataadmissao" class="form-label">Data de Admissão</label>
                    <input type="date" class="form-control" name="dataadmissao" id="dataadmissao">
                </div>

                <div class="col-12">

                <select name="funcao" id="funcao" class="form-select mb-3">
                    <option value="ADM">Administrativo</option>
                    <option value="OPE">Operacional</option>

                </div>

                <input type="hidden" class="form-control" name="fkempresa" id="fkempresa" value="<?=session("codadmin")?>">

                <div class="col-12">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Estou ciente de estar contratando um funcionário e quero confirmar a ação.
                            </label>
                            <div class="invalid-feedback">
                                A Ação é obrigatória
                            </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Cadastrar Funcionário</button>
                </div>
                <?= form_close() ?>
            </div>

            <br>

            <h1>Funcionarios Cadastrados</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cpf</th>
                        <th scope="col">Função</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($funcionarios as $funcionario) : ?>
                        <tr>
                            <th scope="row"><?= esc($funcionario["codfuncionario"]) ?></th>
                            <td><?= esc($funcionario["nome"]) ?></td>
                            <td><?= esc($funcionario["cpf"]) ?></td>
                            <td><?= esc($funcionario["funcao"]) ?></td>
                            <td>
                                <a href="javascript:remover(<?= $funcionario["codfuncionario"] ?>)"><img class="lixo" src="/img/trash.svg"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="confirmacao">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja realmente deletar esse funcionario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="btn btn-danger" id="link-exclusao">Sim</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        function remover(id) {
            const link = document.getElementById("link-exclusao");
            const modalExclusao =
                new bootstrap.Modal(document.getElementById("confirmacao"), {});

            link.setAttribute("href", `/cliente/funcionario/remover/${id}`);

            modalExclusao.show();
        }
    </script>

</body>
<?php $this->endSection() ?>