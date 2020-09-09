<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function batches()
    {
        return $this->belongsTo('App\Batch','batch_id');
    }
}
