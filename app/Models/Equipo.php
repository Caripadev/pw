<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'status',
        'user_id',
        'serie_id',
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
}
}
