<?php

namespace App\Models;

use App\Models\Adhtuteur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Matrimoniale extends Model
{
    use HasFactory;

    public function matrimonialeAdhtuteur()
    {
        return $this->belongsTo(Adhtuteur::class,"id");
    }
}
