<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncomendaProduto extends Model
{
    use HasFactory;

    protected $primaryKey="id_enc_prod";

    protected $table="encomendas_produtos";
    
}