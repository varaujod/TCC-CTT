<?php $this->extend('template')?>

<?php $this->section('conteudo') ?>

<link rel="stylesheet" href="/assets/css/admin/setores.css">

<script src="/js/notificacao.js">

</script>

<Script>
    var ultimoId = <?= $ultimo ?>;
    const intervalo = 100;

    function mostrarToast(assunto){
        Toastify({
            text: "Novo requerimento cadastrado - "+assunto,
            gravity: "botton",
            position: "left",
            close: true,
            style: {
                background: "#4d5f0d",
                color: "white"
            }
        }).showToast();
    }

    async function verificarRequerimentos(){
        const requisicao = await fetch(`http://localhost:8080/notificacao/requerimento/${ultimoId}`);
        const novos = await requisicao.json();
        if(novos.length > 0){
            ultimoId = novos[0].codrequerimento;
            mostrarToast(novos[0].assunto);
            executarSom();
            sendNotification({
            title: 'Novo requerimento',
            message: 'Novo requerimento foi cadastrado',
            icon: 'image.png',
            clickCallback: function (){
            }
        });
        }
        setTimeout(verificarRequerimentos, intervalo);
    }

    verificarRequerimentos();

</Script>

<audio 
    title="Alerte"
    src="/audio/notificacao.mp3" style="visibility: 0" id="audio"></audio>

    <button id="habilitarNotificacao">Ativar notificação</button>''

    <div class="card-group position-absolute top-50 start-50 translate-middle h-25 gap-2">
<?php foreach ($categorias as $categoria) : ?>
  
    <div class="card" style='width: 18rem;'>
      <div class="card-body img-cat">
        <h5 class="card-title position-absolute top-0 start-50 translate-middle-x"><?= $categoria->nomecategoria ?></h5>
        <p class="card-text">
          <img src="/uploads/Categorias/<?= $categoria->cat_logo ?>" alt="" height="100px">
        </p>
        <a href="consultar/<?= $categoria->codcategoria ?>" class="btn btn-success position-absolute top-100 start-50 translate-middle btn-empresas">Empresas</a>
      </div>
    </div>
 
<?php endforeach; ?>
</div>

<button type="button" class="btn btn-success position-absolute bottom-0 end-0 m-2 btn-cadastrar" href="cadastro"><a href="/admin/cadastro">Cadastrar Empresa
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
    </svg></button></a>
</body>


<script>
    const btnNotificacao = document.getElementById("habilitarNotificacao");
    btnNotificacao.addEventListener("click", () => {
        let audioElement = document.getElementById("audio");
        audioElement.muted = !audioElement.muted;
        if(audioElement.muted){
            btnNotificacao.innerHTML = "Ativar notificação";
        }else{
            btnNotificacao.innerHTML = "Desativar notificação";
        }
    });
</script>

<?php $this->endSection() ?>