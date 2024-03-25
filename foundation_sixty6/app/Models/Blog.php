<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = ['author_id','title', 'published_date','content','thumbnail'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
