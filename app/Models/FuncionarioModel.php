<?php

namespace App\Models;

use CodeIgniter\Model;

class FuncionarioModel extends Model
{
    protected $table                = 'funcionarios_empresas';
    protected $primaryKey           = 'codfuncionario';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ["dataadmissao", "nome", "cpf", "datanasc", "funcao","fkempresa","dataexame"];

    public function listarFuncionarios($id){
        $builder = $this->db->query("SELECT fe.*, fe.dataadmissao 'dataadm', fe.nome 'nome', fe.cpf 'cpf',fe.datanasc 'datana', fe.funcao 'funcao' FROM funcionarios_empresas fe  WHERE fe.fkempresa=$id GROUP BY fe.codfuncionario ORDER BY fe.codfuncionario ASC");

        return $builder->getResultArray(); 
    }

    public function Dataexame($dataadm,$nome,$cpf,$datanasc,$funcao,$fkempresa)
    {
        $builder = $this->db->query("CALL cadfunc(?,?,?,?,?,?)",[$dataadm,$nome,$cpf,$datanasc,$funcao,$fkempresa]);
        return $builder->getResult();
    }

    public function eventocalendar()
    {
        return $this->db->query("SELECT CONCAT(f.nome, ' - ', us.nome) 'title',dataexame 'start',dataexame 'end' from funcionarios_empresas f INNER JOIN usuario us on f.fkempresa=us.codadmin")->getResultArray();
    }


}

?>