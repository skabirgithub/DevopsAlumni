<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
     protected $fillable=['category','title','subtitle','description','image','file','url'];

}
