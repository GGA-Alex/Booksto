<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad',
        'slug',
        'imagen'
    ];

    public function libros()
    {
        return $this->belongsToMany(Book::class);
    }
}
