<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Get the user that created the topic.
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the topic's comments.
     */
    public function comments()
    {
        return $this->hasMany(ForumComment::class);
    }
}
