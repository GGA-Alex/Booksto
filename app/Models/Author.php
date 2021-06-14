<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'slug',
        'image'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}