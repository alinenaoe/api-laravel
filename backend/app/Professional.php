<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tecnology;

class Professional extends Model
{

    protected $table = "professionals"; 
    // public $timestamps = false; ---- colocaria essa linha se não tivesse timestamps na migration

    public function tecnologies()
    {
        return $this->hasMany('App\Tecnology','professionals_tecnologies','professional_id','tecnology_id');

    }
}
