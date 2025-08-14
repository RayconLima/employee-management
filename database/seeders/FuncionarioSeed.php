<?php

namespace Database\Seeders;

use App\Models\{Funcionario, Cargo};
use Illuminate\Database\Seeder;

class FuncionarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::factory(5)->create()->each(function ($cargo) {
            Funcionario::factory(5)->create([
                'cargo_id' => $cargo->id
            ]);
        });
        // Funcionario::factory(5)->create()->each(function ($funcionario) {
        //     Cargo::factory(5)->create(['cargo_id' => $funcionario->cargo_id]);
        // });
    }
}
