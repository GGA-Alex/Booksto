<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'ciudad',
        'slug',
        'imagen'
    ];

    public function Books()
    {
        return $this->hasMany(Book::class);
    }
}
