<?php

namespace App\Models;

use CodeIgniter\Model;

class RequerimentoModel extends Model
{
    protected $table = "requerimento";
    protected $primaryKey = "codrequerimento";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["assunto", "texto", "datarequerimento", "statusrequerimento", "fkempresa", "laudo"];

    public function publicarStatus(){
        return $this->db->query("SELECT statusrequerimento FROM requerimento 
        WHERE statusrequerimento = 0");
    }

    public function listarRequerimento($id){
        $builder = $this->db->query("SELECT codrequerimento, date_format(datarequerimento, '%d/%m/%Y') as datafinal, assunto, statusrequerimento,laudo  FROM requerimento r WHERE r.fkempresa=$id and r.texto IS NOT NULL  GROUP BY codrequerimento ORDER BY codrequerimento ASC ");

        return $builder->getResultArray();
    }

    public function listarRequerimentos(){
        $builder = $this->db->query("SELECT codrequerimento, date_format(datarequerimento, '%d/%m/%Y') as datafinal, assunto, statusrequerimento, us.nome 'nome' FROM requerimento r  INNER JOIN usuario us on us.codadmin = r.fkempresa WHERE r.assunto IS NOT NULL GROUP BY codrequerimento ORDER BY codrequerimento ASC");

        return $builder->getResultArray();
    }

    public function getNovosRequerimentos($id){
        return $this->db->query("SELECT * FROM requerimento
        WHERE codrequerimento>?", [$id])->getResultArray();
    }

    public function getUltimoId(){
        return $this->db->query("SELECT codrequerimento FROM requerimento ORDER BY codrequerimento DESC LIMIT 1;")->getResultArray();
    }

    public function requerimentoEmProcessamento(){
        $status = $this->db->query("UPDATE requerimento SET statusrequrimento = 1");
        $status = $this->db->query("SELECT statusrequerimento FROM requerimento 
        WHERE statusrequerimento = 1");

        return $status;
    }

    public function requerimentoConcluido(){
        return $this->db->query("UPDATE requerimento SET statusrequrimento = 2");
    }
}
?>