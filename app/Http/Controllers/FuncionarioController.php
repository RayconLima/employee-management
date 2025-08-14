<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Funcionario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function index(Funcionario $funcionario)
    {
        return $funcionario->with('cargo')->get();
    }

    public function store(Request $request, Cargo $cargo): JsonResponse
    {
        $cargo->where('id', '=', $cargo->id)->with('funcionarios')->firstOrFail();

        $funcionarios   = $request->all();

        $cargo->funcionarios()->create($funcionarios);

        return response()->json([
            'message'   => 'Cargo cadastrado com sucesso!',
            'data'      => $cargo->load('funcionarios')
        ], 201);
    }

    public function destroy(Cargo $cargo, Funcionario $funcionario): JsonResponse
    {
        $cargo->where('id', '=', $cargo->id)->with('funcionarios')->firstOrFail();

        $cargo->funcionarios()->find($funcionario->id)->delete();

        return response()->json([
            'message'   => 'Funcionario removido com sucesso!'
        ], 200);
    }

    public function update(Request $request, Cargo $cargo, Funcionario $funcionario): JsonResponse
    {
        $cargo->where('id', '=', $cargo->id)->with('funcionarios')->firstOrFail();

        $cargo->funcionarios()->find($funcionario->id)->update($request->all());

        return response()->json([
            'message'   => 'Funcionario atualizado com sucesso!',
            'data'      => $cargo->load('funcionarios')
        ], 200);
    }
}
