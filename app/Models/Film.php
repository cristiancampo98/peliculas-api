<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'caratula',
        'title',
        'description',
        'duration',
        'release_date',
        'trailer'
    ];

    protected $with = ['rating'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_film');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
}
