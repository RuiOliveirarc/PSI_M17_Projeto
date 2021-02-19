<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FornecedorProduto extends Model
{
    use HasFactory;

    protected $primaryKey="id_for_prod";

    protected $table="fornecedores_produtos";
    
}