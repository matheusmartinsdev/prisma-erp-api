<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratante extends Model
{
    use HasFactory;

    protected $table = 'contratantes';

    protected $guarded = [];

    public function scopeComOrdensCount(Builder $query)
    {
        return $query->withCount('ordens');
    }

    public function ordens()
    {
        return $this->hasMany(OrdemServico::class);
    }
}
