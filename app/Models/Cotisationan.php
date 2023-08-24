<?php

namespace App\Models;

use App\Models\Exercice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisationan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','exercice_id','status',
    ];

    public function cotisationanExercice()
    {
        return $this->belongsTo(Exercice::class,"exercice_id");
    }
}
