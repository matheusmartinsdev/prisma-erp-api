<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratante extends Model
{
    use HasFactory;

    protected $table = 'contratantes';

    protected $guarded = [];

    public function servicos()
    {
        return $this->hasMany(OrdemServico::class);
    }
}
