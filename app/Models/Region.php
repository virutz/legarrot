<?php

namespace App\Models;

use App\Models\Entreprise;
use App\Models\Section;
use App\Models\Adhtuteur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','nameabrv','entreprise_id','phone1','phone2','status',
    ];

    public function regionEntreprise()
    {
        return $this->belongsTo(Entreprise::class,"entreprise_id");
    }

    public function regionSection()
    {
        return $this->belongsTo(Section::class,"id");
    }

    public function regionAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"id");
    }

}
