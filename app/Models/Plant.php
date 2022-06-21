<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = ['name', 'description', 'days_to_water', 'water_count', 'sun', 'user_id', 'room_id', 'next_water'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function plantImages()
    {
        return $this->hasMany(PlantImage::class);
    }
}
