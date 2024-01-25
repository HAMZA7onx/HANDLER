<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'likes',
    ];
    use HasFactory;

    /* Eager Loading */
    protected $with = [
        'comments',
        'user'
    ];
 
    public function comments() {
        return $this->hasMany(Comment::class, 'idea_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
