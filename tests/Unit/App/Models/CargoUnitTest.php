<?php

namespace Tests\Unit\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cargo;
use Tests\TestCase;

class CargoUnitTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillableAttribute()
    {
        $fillable = [
            'descricao'
        ];
        $cargo = new Cargo();
        $this->assertEquals($fillable, $cargo->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [HasFactory::class];
        $cargoTraits = array_keys(class_uses(Cargo::class));
        $this->assertEquals($traits, $cargoTraits);
    }

    public function testDatesAttribute()
    {
        $dates = ['created_at', 'updated_at'];
        $cargo = new Cargo();
        foreach ($dates as $date) {
            $this->assertContains($date, $cargo->getDates());
        }
        $this->assertCount(count($dates), $cargo->getDates());
    }
}
