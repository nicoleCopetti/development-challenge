<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditores extends Model
{
    protected $fillable = ['id_auditoria', 'nome', 'cpf', 'cargo'];

}
