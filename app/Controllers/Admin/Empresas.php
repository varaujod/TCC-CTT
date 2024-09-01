<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\CategoriaModel;

class Empresas extends BaseController
{
    public function consultar($id = 0)
    {
        $categoriasModel = new CategoriaModel();
        $dados["categorias"] = $categoriasModel->listCategoria();
        $empresaModel = new AdminModel();
        $dados["lista"] = $empresaModel->getConsultarCategoria($id);
        return view("admin/empresas", $dados);
    }

    public function buscar($buscar)
    {
        $empresaModel = new AdminModel();
        $dados=$empresaModel->buscar($buscar);
        $dados["listagem"];
    }

    public function listaCategoria()
    {
        $categoriaModel = new AdminModel();
        $cat["categorias"] = $categoriaModel->findAll();
        return view("admin/cadastro", $cat);
    }

    public function remover($id)
    {
        $empresaModel = new AdminModel();
        if ($empresaModel->delete($id)) {
            if ($empresaModel->delete($id)) {
                session()->setFlashdata("tipo", "success");
                session()->setFlashdata("mensagem", "Item excluído com sucesso");
            } else {
                session()->setFlashdata("tipo", "error");
                session()->setFlashdata("mensagem", "Erro ao excluir");
            }
            return redirect()->to("/admin/setores");
        }

        return "Erro";
    }

    public function salvar()
    {
        $adminModel = new AdminModel();

        $dadosEnviados =
            $nome = $this->request->getPost("nome");
        $email = $this->request->getPost("email");
        $senha = $this->request->getPost("senha");
        $nivel = $this->request->getPost("nivel");
        $cnpj = $this->request->getPost("cnpj");
        $endereco = $this->request->getPost("endereco");
        $categoria = $this->request->getPost("fkcategoria");

        $regras =
            [
                'cnpj' => 'required|min_length[11]|integer',
                'nome' => 'required|min_length[2]|',
                'endereco' => 'required'
            ];

        $mensagem =
            [
                'cnpj' => ['required' => 'CNPJ não valido'],
                'nome' => ['required' => 'O nome é obrigatório', 'min_lenght' => 'O nome precisa ser válido'],
                'endereco' => ['required' => 'O endereco é obrigatório']
            ];

        if ($this->validate($regras, $mensagem)) {
            if ($adminModel->cadastrar($nivel, $nome, $cnpj, $senha, $email, $endereco, $categoria)) {
                session()->setFlashdata("tipo", "success");
                session()->setFlashdata("mensagem", "Salvo com sucesso");
            } else {
                session()->setFlashdata("tipo", "error");
                session()->setFlashdata("mensagem", " Empresa não salva");
            }
            return redirect()->to("/admin/cadastro");
        } else {
            session()->setFlashdata("validacao", $this->validator);
            session()->setFlashdata("empresa", $dadosEnviados);
            return redirect()->to("/admin/cadastro");
        }
    }
}
