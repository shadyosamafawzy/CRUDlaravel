<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable   = ['name','description','cat_id'];
    public    $timestamps = false;


}
