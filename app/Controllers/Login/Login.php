<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Exception;

class Login extends BaseController
{
    public function index()
    {
        if (session("nivel") == 1 ) {
            return redirect()->to(base_url("admin/setores"));
        }
        if(session("nivel") == 2){
            return redirect()->to(base_url("cliente/"));
        }
        return view("cliente/login");
    }

    public function entrar()
    {
        try {
            $email = $this->request->getPost("email");
            $senha = $this->request->getPost("senha");
            $adminModel = new AdminModel();
            $admin = $adminModel->entrar($email, $senha);
            session()->set("codadmin", $admin["codadmin"]);
            session()->set("nivel", $admin["nivel"]);
            session()->set("nome", $admin["nome"]);

            if (session("nivel") == 1) {
                return redirect()->to("admin/setores",);
            } else if (session("nivel") == 2) {
                return redirect()->to("cliente");
            } else {
                return redirect()->to("login");
            }
        } catch (Exception $erro) {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", $erro->getMessage());
            return redirect()->to("/login");
        }
    }

    public function sair()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("/"));
    }

    
}
