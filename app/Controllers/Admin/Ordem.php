<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrdemModel;
use App\Models\AdminModel;

class Ordem extends BaseController
{
    public function index()
    {
        $empresaModel = new AdminModel();
        $dados["empresas"] = $empresaModel->listEmpresas();
        return view("admin/ordem",$dados);
    }   

    public function remover($id)
    {
        $modelOrdem = new OrdemModel();
        if ($modelOrdem->delete($id)) {
            if ($modelOrdem->delete($id)) {
                session()->setFlashdata("tipo", "success");
                session()->setFlashdata("mensagem", "Item excluído com sucesso");
            } else {
                session()->setFlashdata("tipo", "error");
                session()->setFlashdata("mensagem", "Erro ao excluir");
            }
            return redirect()->to("/admin/agendamento");
        }

        return "Erro";
    }
  
    public function salvar()
    {
        $modelOrdem = new OrdemModel();
        $dadosEnviados = $this->request->getPost();
           
        if ($modelOrdem->save($dadosEnviados)) {
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem", "Salvo com sucesso");
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", " Ordem não salva");
        }
        return redirect()->to("/admin/ordem");
    }
}

?>