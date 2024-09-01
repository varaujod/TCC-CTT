<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\OrdemModel;
use App\Models\CategoriaModel;
use App\Models\RequerimentoModel;
use App\Models\FuncionarioModel;

class ViewsAdmin extends BaseController
{

    public function emp()
    {
        $empresaModel = new AdminModel();
        $dados["empresas"] = $empresaModel->listEmpresas();
        return view("admin/empresas", $dados);
    }

    public function setores($id=0)
    {
        $categoriasModel = new CategoriaModel();
        $requerimentoModel = new RequerimentoModel();
        $dados["categorias"] = $categoriasModel->listCategoria();
        $empresaModel = new AdminModel();
        $dados["lista"] = $empresaModel->getConsultarCategoria($id);
        $consultaUltimo = $requerimentoModel->getUltimoId();
        if(count($consultaUltimo) > 0){
            $dados["ultimo"] = $consultaUltimo[0]["codrequerimento"];
        }
        else{
            $dados["ultimo"] = 0;
        }
        return view("admin/setores", $dados);
    }

    public function agendamento()
    {
        $ordemModel=new OrdemModel();
        $ordems["ordems"]=$ordemModel->listOrdem();
        return view ("admin/agendamento",$ordems);
    }

    public function cadastroemp()
    {
        return view('admin/cadastro');
    }

    public function ordem()
    {
        return view('admin/ordem');
    }

    public function documento()
    {
        return view('admin/documentos');
    }

    public function categorias()
    {
        return view ('admin/categorias');
    }

    public function planejamento()
    { 
        $funcionarioModel = new FuncionarioModel();
        $dados['eventos']=$funcionarioModel->eventocalendar();
        return view('admin/planejamento',$dados);
    }

    public function inserir_doc($id)
    {
        $requerimentoModel = new RequerimentoModel();
        $dados["requerimentos"] = $requerimentoModel->listarRequerimento($id);
        $dados["id"]=$id;
        return view ('admin/cadastro_doc',$dados);
    }

    public function listarequisicao()
    {
        $requerimentoModel = new RequerimentoModel();
        $dados["requerimentos"] = $requerimentoModel->listarRequerimentos();
        return view ('admin/requerimentos',$dados);
    }

    public function listafunc($id)
    {
        $funcionarioModel = new FuncionarioModel();
        $dados["funcionarios"] = $funcionarioModel->listarFuncionarios($id);
        return view ('admin/lista-funcionarios', $dados);
    }

}

?>