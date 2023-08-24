<?php

namespace App\Models;

use App\Models\Adhbeneficiaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parente extends Model
{
    use HasFactory;

    public function parenteAdhbeneficiaire()
    {
        return $this->belongsTo(Adhbeneficiaire::class,"id");
    }
}
