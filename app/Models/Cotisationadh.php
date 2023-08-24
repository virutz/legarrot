<?php

namespace App\Models;

use App\Models\Exercice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotisationadh extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','exercice_id','status',
    ];

    public function cotisationadhExercice()
    {
        return $this->belongsTo(Exercice::class,"exercice_id");
    }
}
