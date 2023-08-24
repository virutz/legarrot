<?php

namespace App\Models;

use App\Models\Adhtuteur;
use App\Models\Pidentite;
use App\Models\Parente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adhbeneficiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'adhtuteur_id',
        'parente_id',
        'adhbname',
        'adhbnamelast',
        'adhbsexe',
        'adhbdatenais',
        'adhblieunais',
        'adhbphone1',
        'adhbphone2',
        'pidentite_id',
        'adhbpnumero',
        'status',
    
    ];

    public function adhbeneficiaireAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"adhtuteur_id");
    }

    public function adhbeneficiairePidentite()
    {
        return $this->belongsTo(Pidentite::class,"pidentite_id");
    }

    public function adhbeneficiaireParente()
    {
        return $this->belongsTo(Parente::class,"parente_id");
    }
}
