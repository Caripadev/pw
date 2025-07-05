<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'status',
        'user_id',
    ];
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
