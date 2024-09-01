<?php

namespace App\Controllers;

use App\Models\RequerimentoModel;

    class Notificacao extends BaseController{

        function NovosRequerimentos($ultimoId){
            $requerimentoModel = new RequerimentoModel();
            $novos = $requerimentoModel->getNovosRequerimentos($ultimoId);
            echo json_encode($novos, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }



?>