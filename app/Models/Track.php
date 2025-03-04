<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table = 'tracks';
    protected $fillable = ['name', 'album_id', 'duration'];
    
    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'tracks_categories', 'track_id', 'category_id');
    }
}
