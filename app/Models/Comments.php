<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ["user_id", "thread_id", "body"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, "mediable");
    }
}
