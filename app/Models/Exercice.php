<?php

namespace App\Models;

use App\Models\Cotisationadh;
use App\Models\Cotisationan;
use App\Models\Cotisationmen;
use App\Models\Adhtuteur;
use App\Models\Adhenfant;
use App\Models\Soutien;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status',
    ];

    public function exerciceCotisationadh()
    {
        return $this->belongsTo(Cotisationadh::class,"id");
    }

    public function exerciceCotisationan()
    {
        return $this->belongsTo(Cotisationan::class,"id");
    }

    public function exerciceCotisationmen()
    {
        return $this->belongsTo(Cotisationmen::class,"id");
    }

    public function exerciceAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"id");
    }

    public function exerciceAdhenfant()
    {
        return $this->belongsTo(Adhenfant::class,"id");
    }

    public function exerciceSoutien()
    {
        return $this->belongsTo(Soutien::class,"id");
    }
}
