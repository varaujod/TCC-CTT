<?php

namespace App\Controllers\Funcionarios_empresas;

use App\Models\FuncionarioModel;
use App\Controllers\BaseController;

class Funcionario extends BaseController{
    public function index($id = 0){
        $funcionarioModel = new FuncionarioModel();
        $dados["funcionarios"] = $funcionarioModel->findAll();

        if($id != 0){
            $funcionario = $funcionarioModel->find($id);
            if(!$funcionario){
                session()->setFlashdata("tipo", "danger");
                session()->setFlashdata("mensagem", "Funcionario não encontrado");
                return redirect()->to(base_url("/cliente/cadastro_func"));
            }
            $dados["funcionario"]=$funcionario;
        }
    }

    public function salvarfunc(){
        $modelFuncionario = new FuncionarioModel();
        $dadosEnviados = $this->request->getPost();
        $modelFuncionario->Dataexame($dadosEnviados["dataadmissao"],$dadosEnviados["nome"],$dadosEnviados["cpf"],$dadosEnviados["datanasc"],$dadosEnviados["funcao"],$dadosEnviados["fkempresa"]);
        return redirect()->to($_SERVER['HTTP_REFERER']);
}

public function remover($id){
    $funcionarioModel = new FuncionarioModel();
    if($funcionarioModel->delete($id)){
        if ($funcionarioModel->delete($id)) {
            session()->setFlashdata("tipo", "success");
            session()->setFlashdata("mensagem", "Funcionário excluído com sucesso");
        } else {
            session()->setFlashdata("tipo", "danger");
            session()->setFlashdata("mensagem", "Erro ao excluir");
        }

        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}
}

?>