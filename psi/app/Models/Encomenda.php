<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    use HasFactory;

    protected $primaryKey="id_encomenda";

    protected $table="encomendas";

    protected $fillable = [
        'designacao',
        'observacoes',
    ];

    public function produtos(){
    	return $this->belongsToMany(
    		'App\Models\Produto',
    		'encomendas_produtos',
    		'id_produto',
    		'id_encomenda'
    	)->withTimestamps();
    }
    public function vendedores(){
        return $this->belongsToMany(
            'App\Models\Vendedor',
            'encomendas_vendedores',
            'id_vendedor',
            'id_encomenda'
        )->withTimestamps();
    }
}