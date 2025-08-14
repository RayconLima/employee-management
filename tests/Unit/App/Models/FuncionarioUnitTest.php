<?php

namespace Tests\Unit\App\Models;

use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tests\TestCase;

class FuncionarioUnitTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillableAttribute()
    {
        $fillable = [
            'nome',
            'sobrenome',
            'data_de_nascimento',
            'salario'
        ];
        $loja = new funcionario();
        $this->assertEquals($fillable, $loja->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [HasFactory::class];
        $lfuncionarioTraits = array_keys(class_uses(Funcionario::class));
        $this->assertEquals($traits, $lfuncionarioTraits);
    }

    public function testDatesAttribute()
    {
        $dates = ['created_at', 'updated_at'];
        $funcionario = new funcionario();
        foreach ($dates as $date) {
            $this->assertContains($date, $funcionario->getDates());
        }
        $this->assertCount(count($dates), $funcionario->getDates());
    }

    public function testCastsAttribute()
    {
        $casts = ['id' => 'integer'];
        $funcionario = new funcionario();
        $this->assertEquals($casts, $funcionario->getCasts());
    }
}
