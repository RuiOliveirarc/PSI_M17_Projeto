<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $primaryKey="id_fornecedor";

    protected $table="fornecedores";

    protected $fillable = [
        'nome',
        'morada',
        'telefone',
        'observacoes',
    ];

    public function produtos(){
    	return $this->belongsToMany(
    		'App\Models\Produto',
    		'fornecedores_produtos',
    		'id_produto',
    		'id_fornecedor'
    	)->withTimestamps();
    }

    public function categorias(){
        return $this->belongsToMany(
            'App\Models\Categoria',
            'categorias_fornecedores',
            'id_categoria',
            'id_fornecedor'
        )->withTimestamps();
    }
}