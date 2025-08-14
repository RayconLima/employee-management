<?php

namespace Tests\Feature\Models;

use App\Models\Cargo;
use Tests\TestCase;

class CargoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateCargo()
    {

        $cargo = Cargo::create([
            'descricao' => 'Professor',
        ]);

        $this->compareColunas();

        $assert = Cargo::where('descricao', 'Professor')->first();

        $this->assertNotNull($assert);
        $this->assertUpdateCargo($cargo);
        $this->assertDeleteCargo($cargo);

    }

    private function assertUpdateCargo($cargo)
    {
        $data = [
            'descricao' => 'tester'
        ];

        $cargo->update($data);

        $update = Cargo::where('descricao', 'tester')->first();

        $this->assertNotNull($update);
    }

    private function assertDeleteCargo($cargo)
    {
        $cargo->delete();

        $delete = Cargo::where('id', $cargo->id)->first();

        $this->assertNull($delete);
    }
    private function compareColunas()
    {
        $cargos = Cargo::all();
        $this->assertCount($cargos->count(), $cargos);

        $cargoKey = array_keys($cargos->first()->getAttributes());

        $this->assertEqualsCanonicalizing(
            [
                'created_at',
                'descricao',
                'id',
                'updated_at'
            ],
            $cargoKey
        );
    }
}
