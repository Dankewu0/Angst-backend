<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = ["title", "description", "user_id"];
    public function builditem()
    {
        return $this->hasMany(BuildItem::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
