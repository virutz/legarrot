<?php

namespace App\Models;

use App\Models\Exercice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soutien extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','montant','exercice_id','status'
    ];

    public function soutienExercice()
    {
        return $this->belongsTo(Exercice::class,"exercice_id");
    }
}
