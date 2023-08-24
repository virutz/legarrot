<?php

namespace App\Models;

use App\Models\Gerant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status',
    ];

    public function profileGerant()
    {
        return $this->belongsTo(Gerant::class,"id");
    }
}
