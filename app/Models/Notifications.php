<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $fillable = ["user_id", "type", "read_at"];
    protected $casts = [
        "read_at" => "datetime",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
