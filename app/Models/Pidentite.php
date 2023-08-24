<?php

namespace App\Models;

use App\Models\Adhtuteur;
use App\Models\Adhbeneficiaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pidentite extends Model
{
    use HasFactory;

    public function pidentiteAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"id");
    }

    public function pidentiteAdhbeneficiaire()
    {
        return $this->belongsTo(Adhbeneficiaire::class,"id");
    }
}
