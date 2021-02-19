<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey="id_categoria";

    protected $table="categorias";

    protected $fillable = [
        'designacao',
        'icone',
    ];


    public function fornecedores(){
        return $this->belongsToMany(
            'App\Models\Fornecedor',
            'categorias_fornecedores',
            'id_categoria',
            'id_fornecedor'
        )->withTimestamps();
    }

    public function produtos(){
        return $this->belongsToMany(
            'App\Models\Produto',
            'categorias_produtos',
            'id_categoria',
            'id_produto'
        )->withTimestamps();
    }
}