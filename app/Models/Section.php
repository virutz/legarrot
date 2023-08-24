<?php

namespace App\Models;

use App\Models\Entreprise;
use App\Models\Adhtuteur;
use App\Models\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','nameabrv','region_id','phone1','phone2','status',
    ];

    public function sectionEntreprise()
    {
        return $this->belongsTo(Entreprise::class,"entreprise_id");
    }

    public function sectionRegion()
    {
        return $this->belongsTo(Region::class,"region_id");
    }

    public function regionGerant()
    {
        return $this->belongsTo(Gerant::class,"id");
    }

    public function sectionAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"id");
    }

}
