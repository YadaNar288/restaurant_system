<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    protected $fillable = ['name','description','category_id','status','image'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}

