<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condutors extends Model
{
    use HasFactory;

    protected $fillable = [
            'nome',
            'cpf',
            'rg',
            'numero_cnh',
            'categoria',
            'validade',
            'uf_cnh',
            'pais',
            'estado',
            'cidade',
            'bairro',
            'logradouro',
            'numero'
    ];
}
