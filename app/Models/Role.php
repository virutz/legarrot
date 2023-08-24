<?php

namespace App\Models;

use App\Models\Gerant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','status',
    ];

    public function roleGerant()
    {
        return $this->belongsTo(Gerant::class,"id");
    }
}
