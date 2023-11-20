<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'marca',
        'modelo',
        'idEmpleado'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
 
}