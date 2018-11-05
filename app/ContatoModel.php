<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoModel extends Model
{
    /**
     * Campos que podem ser preenchidos na tablema,
     * ficam em fillable
     * os protegidos ficam em guarded
     * 
     * Por padraão o Laravel fitra pelo ID e o nome da table é o plural da class
     * se precisar alterar usar:
     * protect $table = 'nomeTabela'
     * protect $primarykey = 'nomeCampo'
     */
    protected $fillable = [
        'name',
        'email',
        'telefone',
        'cep',
    ];
    protected $guarded = [
        'id'
    ];
    protected $table = 'contatos';
}
