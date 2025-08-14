<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public $repository;
    public function __construct(Cargo $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'message'   => 'Cargo cadastrado com sucesso!',
            'data'      => $this->repository->create($request->all())
        ], 201);
    }

    public function update(Request $request, Cargo $cargo): JsonResponse
    {
        return response()->json([
            'message'   => 'Cargo atualizado com sucesso!',
            'data'      => $cargo->update($request->all())
        ], 200);
    }

    public function destroy(Cargo $cargo): JsonResponse
    {
        $cargo->delete();

        return response()->json([
            'message'   => 'Cargos removido com sucesso!'
        ], 200);
    }
}
