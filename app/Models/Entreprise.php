<?php

namespace App\Models;

use App\Models\Region;
use App\Models\Section;
use App\Models\Adhtuteur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','nameabrv','phone1','phone2','status',
    ];

    //public function entrepriseRegion(): HasMany
   // {
       // return $this->hasMany(Region::class);
   // }

    public function entrepriseRegion()
    {
        return $this->belongsTo(Region::class,"id");
    }

    public function entrepriseSection()
    {
        return $this->belongsTo(Section::class,"id");
    }

    public function entrepriseAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"id");
    }
}
