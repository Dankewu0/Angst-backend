<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildItem extends Model
{
    protected $fillable = ["name", "price", "url", "quantity", "build_id"];
    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}
