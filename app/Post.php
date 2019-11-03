<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'slug', 'thumbnail', 'user_id'];

    public function user()
    {
        //Post dimiliki oleh 1 User
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        // if ($this->thumbnail) {
        //     return $this->thumbnail;
        // } else {
        //     return asset('images/no-thumbnail.png');
        // }

        // if ($this->thumbnail) {
        //     return $this->thumbnail;
        // }
        // return asset('images/no-thumbnail.png');

        //ternary ini artinya jika thumbnail tidak ada maka asset itu menampilkan gambar default jika ada : maka diarahkan ke $this->thumbnailnya
        return !$this->thumbnail ? asset('images/no-thumbnail.png') : $this->thumbnail;
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
