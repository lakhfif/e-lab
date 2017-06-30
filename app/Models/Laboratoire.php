<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratoire extends Model
{
    protected $fillable = ['nom','description','adresse','telephone','membre_id','image'];
}
