<?php

namespace App\Http\Controllers;

use App\Models\PontoAlimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PontoAlimentacaoController extends Controller
{
    /**
     * Lista todos os pontos de alimentação
     * GET /api/pontos-alimentacao
     */
    public function index()
    {
        $pontos = PontoAlimentacao::with('criador')->get();
        return response()->json($pontos);
    }

    /**
     * Cria um novo ponto de alimentação
     * POST /api/pontos-alimentacao
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'endereco' => 'required|string',
            'tipo_racao' => 'nullable|string',
            'agua_disponivel' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ponto = PontoAlimentacao::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'endereco' => $request->endereco,
            'tipo_racao' => $request->tipo_racao ?? 'ração',
            'agua_disponivel' => $request->agua_disponivel ?? true,
            'status_racao' => 'vazio',
            'status_agua' => 'vazio',
            'qr_code' => PontoAlimentacao::gerarQrCode(),
            'criado_por' => Auth::id() ?? 1 // para testes, usa 1 se não autenticado
        ]);

        return response()->json($ponto, 201);
    }

    /**
     * Mostra um ponto de alimentação específico
     * GET /api/pontos-alimentacao/{id}
     */
    public function show($id)
    {
        $ponto = PontoAlimentacao::with('criador')->find($id);
        if (!$ponto) {
            return response()->json(['message' => 'Ponto não encontrado'], 404);
        }
        return response()->json($ponto);
    }

    /**
     * Atualiza um ponto de alimentação
     * PUT/PATCH /api/pontos-alimentacao/{id}
     */
    public function update(Request $request, $id)
    {
        $ponto = PontoAlimentacao::find($id);
        if (!$ponto) {
            return response()->json(['message' => 'Ponto não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
            'endereco' => 'sometimes|required|string',
            'tipo_racao' => 'nullable|string',
            'agua_disponivel' => 'boolean',
            'status_racao' => 'in:vazio,baixo,ok,cheio',
            'status_agua' => 'in:vazio,baixo,ok,cheio',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ponto->update($request->all());
        return response()->json($ponto);
    }

    /**
     * Remove um ponto de alimentação
     * DELETE /api/pontos-alimentacao/{id}
     */
    public function destroy($id)
    {
        $ponto = PontoAlimentacao::find($id);
        if (!$ponto) {
            return response()->json(['message' => 'Ponto não encontrado'], 404);
        }
        $ponto->delete();
        return response()->json(['message' => 'Ponto removido com sucesso']);
    }

    // Métodos create e edit não são usados em API REST
    public function create() {}
    public function edit($id) {}
}
