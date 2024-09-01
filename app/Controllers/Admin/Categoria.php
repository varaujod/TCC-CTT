<?php 

    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\CategoriaModel;

    class Categoria extends BaseController
    {
        public function index($id=0)
        {
            $categoriaModel = new CategoriaModel();
            $dados["categorias"] = $categoriaModel->findAll();

            if($id != 0)
            {
                $categoria = $categoriaModel->find($id);
                $dados["categoria"] = $categoria;
            }

            return view("admin/cadastro", $dados);
        }

        public function salvar()
        {
            $dadosEnviados = $this->request->getPost();

            if (
                $this->request->getFile('logo')->getSize() == 0
                && !is_numeric($dadosEnviados["codcategoria"])
            ) {
                session()->setFlashdata("tipo", "danger");
                session()->setFlashdata("mensagem", "A imagem é obrigatória");
                return redirect()->to("admin/cadastro/categoria");
            }
    
            $categoriaModel = new CategoriaModel();
    
            $alterarImagem = true;
    
            if (is_numeric($dadosEnviados["codcategoria"])) {
    
                $catAtual = $categoriaModel->find($dadosEnviados["codcategoria"]);
    
                if ($this->request->getFile('logo')->getSize() == 0) {
    
                    $dadosEnviados["logo"] = $catAtual["logo"];
                    $alterarImagem = false;
    
                } else {
                    unlink(ROOTPATH . "public\\uploads\\Categorias\\" . $catAtual["logo"]);
                }
            }
    
            if ($alterarImagem) {
                $logo = $this->request->getFile('logo');
    
                $nomeAleatorio = uniqid();
    
                $logoRedimensionada = \Config\Services::image();
    
                $logoRedimensionada->withFile($logo);
    
                $logoRedimensionada->resize(300, 300, true);
    
                $logoRedimensionada->save(ROOTPATH . "public\\uploads\\Categorias\\$nomeAleatorio.jpeg");
    
                $dadosEnviados["logo"] = "$nomeAleatorio.jpeg";
            }
    
            if ($categoriaModel->save($dadosEnviados)) {
                session()->setFlashdata("tipo", "success");
                session()->setFlashdata("mensagem", "Salvo com sucesso");
            } else {
                session()->setFlashdata("tipo", "danger");
                session()->setFlashdata("mensagem", "Erro ao salvar");
            }
            return redirect()->to("/admin/categoria");
        }
    }
    ?>