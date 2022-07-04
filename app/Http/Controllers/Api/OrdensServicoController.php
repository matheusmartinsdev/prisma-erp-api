<?php

namespace App\Http\Controllers\Api;

use App\Models\OrdemServico;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class OrdensServicoController extends Controller
{
    use DisableAuthorization;

    protected $model = OrdemServico::class;

    public function filterableBy(): array
    {
        return ['tipagem'];
    }

    public function exposedScopes(): array
    {
        return ['contagemCorretivas', 'contagemPreventivas', 'contagemFinalizadas', 'contagemEmAberto'];
    }

    public function getOrdensPorTipo()
    {
        $preventivas = OrdemServico::where('tipagem', '=', 'preventiva')->count();
        $corretivas = OrdemServico::where('tipagem', '=', 'corretiva')->count();

        return response()->json(['preventiva' => $preventivas, 'corretivas' => $corretivas]);
    }

    public function getOrdensPorNatureza()
    {
        $servicos = OrdemServico::all()->groupBy('natureza');

        return response()->json($servicos);
    }
}
