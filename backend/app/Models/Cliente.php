<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['recnum', 'razao_social', 'tipo', 'cpf_cnpj','empresa'];
    protected $table = 'clientes';

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa');
    }
}
