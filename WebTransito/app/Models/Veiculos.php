<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'chassi',
        'marca',
        'modelo',
        'cor',
        'especie',
        'pais',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'proprietario'
    ];
}
