<?php

namespace App\Models;

use App\Models\Adhtuteur;
use App\Models\Exercice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adhenfant extends Model
{
    use HasFactory;
    protected $fillable = [
        'exercice_id',
        'adhtuteur_id',
        'adhdatedebut',
        'adhname',
        'adhnamelast',
        'adhsexe',
        'adhdatenais',
        'adhlieunais',
        'adhphone1',
        'adhphone2',
        'status',
    ];

    public function adhenfantAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"adhtuteur_id");
    }

    public function adhenfantExercice()
    {
        return $this->belongsTo(Exercice::class,"exercice_id");
    }
}


