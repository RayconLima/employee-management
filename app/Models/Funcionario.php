<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nome',
        'sobrenome',
        'data_de_nascimento',
        'salario'
    ];

    protected $casts    = [
        'id'    => 'integer',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo', 'id');
    }

    public function getSalarioAttribute($numero): string
    {
        return 'R$ ' . number_format($numero, 2, ',','.');
    }
}
