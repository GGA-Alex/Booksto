<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    const published = 1;
    const notPublished = 2;

    protected $fillable = [
        'isbn',
        'nombre',
        'descripcion',
        'paginas',
        'precio',
        'año',
        'edicion',
        'status',
        'slug',
        'category_id',
        'editorial_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
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
