<?php

namespace App\Models;

use App\Models\Entreprise;
use App\Models\Region;
use App\Models\Section;
use App\Models\Exercice;
use App\Models\Matrimoniale;
use App\Models\Pidentite;
use App\Models\Adhbeneficiaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adhtuteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'exercice_id',
        'section_id',
        'adhtdatedebut',
        'adhtname',
        'adhtnamelast',
        'adhtsexe',
        'adhtdatenais',
        'adhtlieunais',
        'matrimoniale_id',
        'adhprofname',
        'adhtemail',
        'adhtadresse',
        'adhtphone1',
        'adhtphone2',
        'pidentite_id',
        'adhtpnumero',
        'status',
    ];

    public function adhtuteurEntreprise()
    {
        return $this->belongsTo(Entreprise::class,"entreprise_id");
    }

    public function adhtuteurRegion()
    {
        return $this->belongsTo(Region::class,"region_id");
    }

    public function adhtuteurSection()
    {
        return $this->belongsTo(Section::class,"section_id");
    }

    public function adhtuteurExercice()
    {
        return $this->belongsTo(Exercice::class,"exercice_id");
    }

    public function adhtuteurMatrimoniale()
    {
        return $this->belongsTo(Matrimoniale::class,"matrimoniale_id");
    }

    public function adhtuteurPidentite()
    {
        return $this->belongsTo(Pidentite::class,"pidentite_id");
    }

    public function adhtuteurAdhbeneficiaire()
    {
        return $this->belongsTo(Adhbeneficiaire::class,"id");
    }
}
