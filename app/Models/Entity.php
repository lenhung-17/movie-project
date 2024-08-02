<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $table = 'entities';
    protected $fillable = [
        'name',
        'thumbnail',
        'preview',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // An entity has many videos
    public function videos()
    {
        return $this->hasMany(Video::class, 'entity_id');
    }
}
