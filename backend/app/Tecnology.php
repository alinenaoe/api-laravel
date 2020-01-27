<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professional;

class Tecnology extends Model
{
    protected $table = "tecnologies"; 

    public function professionals()
    {
        return $this->hasMany('App\Professional', 'professionals_tecnologies', 'tecnology_id', 'professional_id');
        //poderia usar Professional::class
    }
}

