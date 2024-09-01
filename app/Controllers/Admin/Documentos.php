<?php 

    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\DocumentosModel;

    class Documentos extends BaseController
    {

        public function salvarDoc ()
        {   
            $id=$this->request->getPost("fkempresa");

            if($id!= 0)
            {
                $documentoModel= new DocumentosModel();
    
            $input = $this->validate([
                'laudo' => [
                    'uploaded[laudo]',
                    'mime_in[laudo,application/pdf]',
                ]
            ]);

            if (!$input) {
                session()->setFlashdata("tipo", "error");
                session()->setFlashdata("mensagem", " Documento não salvo");
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                $nomeAleatorio = uniqid();
                $arquivo = $this->request->getFile('laudo');
 
                $arquivo->move(ROOTPATH . "public\\uploads\\laudos\\","$nomeAleatorio.pdf");
        
                $data = [
                    'descricao' =>  $this->request->getPost('descricao'),
                    'dataup'    => $this->request->getPost('dataup'),
                    'laudo'     =>$nomeAleatorio,
                    'fkempresa' =>$this->request->getPost('fkempresa')
                ];
        
                $documentoModel->save($data);
                session()->setFlashdata("tipo", "success");
                session()->setFlashdata("mensagem", "Salvo com sucesso");
                return redirect()->to($_SERVER['HTTP_REFERER']);
            }
            }
        
        }

        public function salvarRequerimento ()
        {   
                $documentoModel= new DocumentosModel();
    
            $input = $this->validate([
                'laudo' => [
                    'uploaded[laudo]',
                    'mime_in[laudo,application/pdf]',
                ]
            ]);

            if (!$input) {
                session()->setFlashdata("tipo", "error");
                session()->setFlashdata("mensagem", " Documento não salvo");
                return redirect()->to($_SERVER['HTTP_REFERER']);
            } else {
                $nomeAleatorio = uniqid();
                $arquivo = $this->request->getFile('laudo');
 
                $arquivo->move(ROOTPATH . "public\\uploads\\laudos\\","$nomeAleatorio.pdf");
        
                $data = [
                    'codrequerimento'  =>$this->request->getPost('codrequerimento'),
                    'statusrequerimento'=>$this->request->getPost('statusrequerimento'),
                    'descricao' =>  $this->request->getPost('descricao'),
                    'dataup'    => $this->request->getPost('dataup'),
                    'laudo'     =>$nomeAleatorio
                ];
        
                $documentoModel->save($data);
                session()->setFlashdata("tipo", "success");
                session()->setFlashdata("mensagem", "Salvo com sucesso");
                return redirect()->to($_SERVER['HTTP_REFERER']);
            }       
        }

        public function consultar($id=0)
        {
            $documentoModel = new DocumentosModel();
            $dados["documentos"] = $documentoModel->listDocumentos($id);
            $dados["id"]=$id;
            return view("admin/documentos", $dados);
        }


        public function consultarano($id,$ano)
        {
            $documentoModel = new DocumentosModel();
            $dados["documentos"] = $documentoModel->listDocumentosano($id,$ano);
            $dados["id"]=$id;
            return view("admin/documentos", $dados);
        }
    }