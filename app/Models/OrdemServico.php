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

    public function scopeContagemPreventivas(Builder $query)
    {
        return $query->where('tipagem', '=', 'preventiva')->count();
    }

    public function scopeContagemCorretivas(Builder $query)
    {
        return $query->where('tipagem', '=', 'corretivas')->count();
    }

    public function scopeFinalizadas(Builder $query)
    {
        return $query->where('finalizacao', '!=', null);
    }

    public function contratante()
    {
        $contratanteFantasma = new Contratante([
            'id'        => 0,
            'nome'      => 'null',
            'cnpj'      => '000000000',
            'cidade'    => 'null',
            'estado'    => 'null',
            'cep'       => 'null'
        ]);
        return $this->belongsTo(Contratante::class)->withDefault($contratanteFantasma);
    }

    public function funcionario()
    {
        $funcionarioFantasma = new Funcionario([
            'id'        => 0,
            'nome'      => 'null',
            'matricula' => '000000000',
            'tipo'      => 'tecnico'
        ]);
        return $this->belongsTo(Funcionario::class)->withDefault($funcionarioFantasma);
    }
}
