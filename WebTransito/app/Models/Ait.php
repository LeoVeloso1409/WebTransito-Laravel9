<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ait extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cod_ait',
        'orgao_autuador',

        'placa',
        'marca',
        'modelo',
        'cor',
        'chassi',
        'pais',
        'especie',

        'nome_condutor',
        'cpf_condutor',
        'rg_condutor',
        'cnh_condutor',
        'uf_cnh',
        'categoria_cnh',
        'validade_cnh',

        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'data',
        'hora',
        'uf_mg',

        'codigo_infracao',
        'descricao',
        'equipamento_afericao',
        'medicao_realizada',
        'limite_regulamentado',
        'valor_considerado',
        'observacoes',

        'medida1',
        'medida2',
        'ficha_vistoria',

        'imagem',

        'matricula',
        'nome',

        'status',
        'situação'
    ];
}
