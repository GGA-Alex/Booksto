<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'telephone',
        'email',
        'country',
        'slug',
        'image'
    ];

    public function Books()
    {
        return $this->hasMany(Book::class);
    }
}
