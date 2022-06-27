<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;

    protected $table = 'ordem_servicos';

    protected $guarded = [];

    public function scopeComContagemDeTipos(Builder $query)
    {
        return $query->where('tipagem', '=', 'preventiva');
    }

    public function contratante()
    {
        return $this->belongsTo(Contratante::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
