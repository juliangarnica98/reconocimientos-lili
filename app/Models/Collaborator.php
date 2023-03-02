<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Area(){
        return $this->belongsTo(Area::class);
    }

    public function Recognitions(){
        return $this->hasMany(Recognition::class);
    }


}
