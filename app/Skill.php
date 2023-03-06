<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name','proficiency','service_id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
