<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class CategoriaModel extends Model
{

    protected $table = "categoria";
    protected $primaryKey = "codcategoria";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["nomecategoria", "codcategoria","logo"];

    public function listCategoria()
    {
        $builder = $this->db->query("SELECT  c.*, c.nomecategoria 'cat_nome',c.codcategoria 'cat_cod',c.logo 'cat_logo' FROM categoria c");

        return $builder->getResult();
    }
}
?>