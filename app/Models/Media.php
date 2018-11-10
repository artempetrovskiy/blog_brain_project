<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'mediable_type',
        'mediable_id',
        'path',
        'collection',
        'size',
        'extension',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
