<?php $this->extend('template') ?>


<?php $this->section('conteudo') ?>

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

<link rel="stylesheet" href="/assets/css/admin/lista-funcionarios.css">


<div class="container">

    <table class="table table-bordered table-striped">
        
    <div class="titulo">
        <h1>Funcionarios Cadastrados</h1>
    </div>

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cpf</th>
                <th scope="col">Função</th>
            </tr>
        </thead>
        <tbody class="ttable-group-divider">
            <?php foreach ($funcionarios as $funcionario) : ?>
                <tr>
                    <th scope="row"><?= esc($funcionario["codfuncionario"]) ?></th>
                    <td><?= esc($funcionario["nome"]) ?></td>
                    <td><?= esc($funcionario["cpf"]) ?></td>
                    <td><?= esc($funcionario["funcao"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php $this->endSection() ?>