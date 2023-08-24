<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Role;
use App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','namelast','email','password','phone1','phone2','profile_id','role_id','section_id','volumesms','status',
    ];

    public function gerantSection()
    {
        return $this->belongsTo(Section::class,"section_id");
    }

    public function gerantRole()
    {
        return $this->belongsTo(Role::class,"role_id");
    }

    public function gerantProfile()
    {
        return $this->belongsTo(Profile::class,"profile_id");
    }
    
}
