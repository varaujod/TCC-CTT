<?php

namespace App\Controllers\Client;

use App\Models\RequerimentoModel;
use App\Controllers\BaseController;

class Requerimento extends BaseController
{
    public function solicitar()
    {
        $RequerimentoModel = new RequerimentoModel();
        $dadosEnviados = $this->request->getPost();

        if ($RequerimentoModel->save($dadosEnviados)) {
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("icon", '<svg class="bi flex-shrink-0 me-2 icons" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>');
            session()->setFlashdata("mensagem", "Solicitação Enviada com Sucesso!");

            if ($RequerimentoModel->publicarStatus()) {
                session()->set("mensagemstatus", "Em Análise");
            }
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Solicitação Mal-Sucedida");
        }
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function requerimentoProcessamento()
    {
        $RequerimentoModel = new RequerimentoModel();
        if ($RequerimentoModel->requerimentoEmProcessamento()) {
            session()->set("mensagemstatus", "Processando seu Pedido");
        } else {
            session()->set("mensagemstatus", "Concluido");
        }
    }

    public function alterar($id)
    {
        $requerimentoModel = new RequerimentoModel();
        $dados['requerimentos'] = $requerimentoModel->findAll();

        if ($id != 0) 
        {
            $requerimentoModel = new RequerimentoModel();
            $requerimentos = $requerimentoModel->find($id);
            if (!$requerimentos) {
                session()->setFlashdata("tipo", "danger");
                session()->setFlashdata("mensagem", "Requerimento não encontrado");
                return redirect()->to(base_url("/admin/requerimentos"));
            }
            $dados['requerimento'] = $requerimentos;
            return view("admin/docrequerimentos", $dados);
        }
    }
}
