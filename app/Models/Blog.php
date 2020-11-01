<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Str;
class Blog extends Model
{
     protected $fillable=['title','details','image','tags','posted_by'];
     
     public function url()
     {
          return route('blog.single', [$this->id, Str::slug($this->title, '-')]);
     }
}
