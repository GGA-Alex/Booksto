<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'pais',
        'slug'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, "imageable");
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
