<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaFornecedor extends Model
{
    use HasFactory;

    protected $primaryKey="id_cat_for";

    protected $table="categorias_fornecedores";
    
}