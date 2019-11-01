<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'slug', 'thumbnail'];

    public function user()
    {
        //Post dimiliki oleh 1 User
        return $this->BelongsTo(User::class);
    }
}
