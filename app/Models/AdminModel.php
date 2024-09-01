<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class AdminModel extends Model{
    protected $table = "usuario";
    protected $primaryKey = "codadmin";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["nivel", "nome", "senha", "email","endereco","fkcategoria","cnpj"];

// Empresas
public function listEmpresas(){
$builder = $this->db->query("SELECT  e.*, e.cnpj 'emp_cnpj', e.nome 'emp_nome', e.endereco 'emp_endereco', cat.nomecategoria 'cat_nome' FROM usuario e INNER JOIN categoria cat on cat.codcategoria = e.fkcategoria where nivel = 2 GROUP BY e.nome ORDER BY e.nome ASC;");

    return $builder->getResult();
}


public function buscar($busca)
{
    if(empty($busca))
    return array();
    $buscar=$this->input->post('buscar');
  
}
public function getConsultarCategoria($id)
{
    $builder = $this->db->table("usuario e");
    $builder->select("e.*");
    $builder->orderBy("e.codadmin");
    $builder->where("e.fkcategoria=$id and nivel=2");
    $query = $builder->get();
    return $query->getResult();
}

public function getUltimaEmpresa()
{
    return $this->db->query("SELECT codadmin FROM usuario ORDER BY codadmin DESC LIMIT 1;")->getResultArray();
}

// Cliente

    public function cadastrar($nivel,$nome, $cnpj,$senha,$email,$endereco,$fkcategoria)
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $this->save(["nome" => $nome,"nivel" => $nivel, "email" => $email, "senha" => $hash, "cnpj" => $cnpj,"endereco"=>$endereco,"fkcategoria"=>$fkcategoria]);
    }

    public function entrar($email, $senha)
    {
        $admin = $this->db->query("SELECT codadmin, nome, senha, nivel FROM usuario where email=?", [$email])->getFirstRow("array");

        if(!$admin)
        {
            throw new Exception("Senha incorreta ou usuário não encontrado");
        }

        if(!password_verify($senha, $admin["senha"]))
        {
            throw new Exception("Senha incorreta ou usuário não encontrado");
        }

        return $admin;
    }

    public function nomeUser($id){
        $user = $this->db->query("SELECT nome from usuario where codadmin=?", [$id])->getFirstRow("array");
        return $user;
    }

}

?>