<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ["user_id", "path"];
    public function mediable()
    {
        return $this->morphTo();
    }
}
