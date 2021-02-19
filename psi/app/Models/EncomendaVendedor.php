<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncomendaVendedor extends Model
{
    use HasFactory;

    protected $primaryKey="id_enc_vend";

    protected $table="encomendas_vendedores";
    
}