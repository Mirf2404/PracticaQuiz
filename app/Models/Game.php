<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
       use HasFactory;
    protected $table = 'preguntas';
    protected $fillable = ['pregunta'];
 public $timestamps = false;
 
    public function respuestas()
    {
        return $this->hasMany(Respuestas::class, 'id_pregunta');
    }
}
