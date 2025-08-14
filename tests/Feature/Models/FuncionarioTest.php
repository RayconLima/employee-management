<?php

namespace Tests\Feature\Models;

//use App\Models\Loja;
use App\Models\{Cargo, Funcionario};
use Tests\TestCase;

class FuncionarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateFuncionario()
    {
        $cargo = $this->createCargo();

        $funcionario                        = new Funcionario();
        $funcionario->nome                  = 'Rodrigo';
        $funcionario->sobrenome             = 'Faro';
        $funcionario->cargo_id              = $cargo->id;
        $funcionario->data_de_nascimento    = '1994-10-15';
        $funcionario->salario               = 1000;
        $funcionario->save();

        $this->compareColunas();

        $assert = funcionario::where('nome', 'Rodrigo')->first();

        $this->assertNotNull($assert);
        $this->assertUpdateFuncionario($funcionario);
        $this->assertDeleteFuncionario($funcionario);

    }

    private function createCargo()
    {
        $cargo = Cargo::create([
            'descricao' => 'Professor',
        ]);

        return $cargo;
    }

    private function assertUpdatefuncionario($funcionario)
    {
        $data = [
            'nome'      => 'Rodrigo',
            'sobrenome' => 'lima',
        ];

        $funcionario->update($data);

        $update = Funcionario::where('nome', 'Rodrigo')->first();

        $this->assertNotNull($update);
    }

    private function assertDeleteFuncionario($funcionario)
    {
        $funcionario->delete();
        $delete = Funcionario::where('id', $funcionario->id)->first();
        $this->assertNull($delete);
    }
    private function compareColunas()
    {
        $funcionario = Funcionario::all();
        $this->assertCount($funcionario->count(), $funcionario);

        $produtoKey = array_keys($funcionario->first()->getAttributes());

        $this->assertEqualsCanonicalizing(
            [
                'cargo_id',
                'created_at',
                'data_de_nascimento',
                'id',
                'nome',
                'salario',
                'sobrenome',
                'updated_at',
            ],
            $produtoKey
        );
    }
}
