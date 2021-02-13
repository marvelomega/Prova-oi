<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
		'galc',
		'endereco',
        'porta',
        'velocidade',
		'ativo',
    ];

    protected $casts = [
        'id'            =>'integer',
        'nome'          =>'string',
		'galc'          =>'string',
        'endereco'      =>'string',
		'porta'         =>'integer',
		'velocidade'    =>'integer',
		'ativo'     	=>'integer',
    ];

    public static $rules = [
        'nome'     => 'required',
        'galc'     => 'required',
        'endereco' => 'required',
    ];

}