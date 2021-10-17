<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
    ];

    /**
     * The related topic.
     */
    public function topic()
    {
        return $this->belongsTo(ForumTopic::class);
    }

    /**
     * Which user created the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
