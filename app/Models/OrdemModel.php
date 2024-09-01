<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class OrdemModel extends Model
{
    protected $table = "ordem";
    protected $primaryKey = "codservico";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["fkempresa", "nome", "dataemissao", "datafinal","email","texto"];

    public function listOrdem(){

        $builder = $this->db->query("SELECT  o.*, us.nome 'ord_nome', date_format(dataemissao, '%d/%m/%Y') as ord_dataemissao, WEEKDAY ('dataemissao') AS valordata, o.datafinal 'ord_datafinal',o.email 'ord_email', o.texto 'ord_texto'FROM ordem o INNER JOIN usuario us on us.codadmin = o.fkempresa");

        return $builder->getResultArray();
    }
}

?>