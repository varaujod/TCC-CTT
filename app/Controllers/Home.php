<?php

namespace App\Controllers;
use App\Models\FuncionarioModel;
use App\Models\RequerimentoModel;

class Home extends BaseController
{
    public function index()
    {
        return view('cliente/home');
    }

    public function cadastrofunc($id){
        $funcionarioModel = new FuncionarioModel();
        $dados["funcionarios"] = $funcionarioModel->listarFuncionarios($id);
        return view ('cliente/cadastro-funcionario', $dados);
    }

    public function info_helloo(){
        return view ('cliente/home-info');
    }

    public function doc($id){
        $requerimentoModel = new RequerimentoModel();
        $dados["id"]=$id;
        $dados["requerimentos"] = $requerimentoModel->listarRequerimento($id);
        return view ('cliente/acompanhardocumento', $dados);
    }
    
}
