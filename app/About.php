<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
   protected $fillable = [
    'name','email','phone','address','description','tagline','photo','cv'
   ];
}
