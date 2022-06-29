<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $guarded = [];

    public function scopeComContagemDeOrdens(Builder $query)
    {
        return $query->where('tipo', '=', 'tecnico')->withCount('ordens');
    }

    public function scopeTecnicos(Builder $query)
    {
        return $query->where('tipo', '=', 'tecnico');
    }

    public function ordens()
    {
        return $this->hasMany(\App\Models\OrdemServico::class);
    }
}
