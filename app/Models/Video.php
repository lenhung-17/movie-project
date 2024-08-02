<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'is_movie',
        'upload_date',
        'release_date',
        'views',
        'duration',
        'season',
        'episode',
        'entity_id'
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entityId');
    }
}
