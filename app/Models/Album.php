<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = ['name', 'singer_id'];

    public function singer(){
        return $this->belongsTo(Singer::class);
    }
    public function tracks(){
        return $this->hasMany(Track::class);
    }

}
