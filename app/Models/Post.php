<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected static function boot()
{
    parent::boot();

    static::creating(function ($post) {
        if (empty($post->slug)) {
            $post->slug = Str::slug($post->body, '-');
        }
    });
}

    protected $fillable = [
        
        'body',
        'image',
        'user_id',
        'slug'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
