<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildItems extends Model
{
    protected $fillable = ["build_id", "name", "url", "price", "quantity"];
    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}
