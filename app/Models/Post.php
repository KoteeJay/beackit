<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    
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

    protected $table = 'posts';
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if ($post->slug) {
                $post->slug = Str::limit($post->slug, 70, '-'); 
            }
        });
        static::saving(function ($post) {
            if ($post->body) {
                $post->body = Str::limit($post->body, 2000, '');
            }
        });
    }

}
