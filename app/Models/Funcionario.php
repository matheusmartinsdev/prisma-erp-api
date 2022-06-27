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

    public function scopeComOrdensCount(Builder $query)
    {
        return $query->where('tipo', '=', 'tecnico')->withCount('ordens');
    }

    public function ordens()
    {
        return $this->hasMany(\App\Models\OrdemServico::class);
    }
}
