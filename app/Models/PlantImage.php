<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantImage extends Model
{
    use HasFactory;
    protected $fillable = ['image_path', 'plant_id'];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
