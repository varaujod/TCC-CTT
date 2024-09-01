<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class DocumentosModel extends Model
{

    protected $table = "requerimento";
    protected $primaryKey = "codrequerimento";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["descricao","dataup","laudo","fkempresa","statusrequerimento"];

    public function listDocumentos($id)
    {
        $builder = $this->db->table("requerimento r");
        $builder->select("r.*");
        $builder->orderBy("r.codrequerimento");
        $builder->where("r.fkempresa=$id and r.texto IS NULL ");
        $query = $builder->get();
        return $query->getResult();
    }

    public function listDocumentosano($id,$ano){
        return $this->db->query("SELECT r.*, YEAR(dataup) ano FROM requerimento r  
        WHERE r.fkempresa=$id AND YEAR(dataup) = ?
        GROUP BY ano ORDER BY ano", [$ano])->getResult();
    }
}
?>