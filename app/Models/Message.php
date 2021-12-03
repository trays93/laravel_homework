<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    /**
     * Get the sender user.
     */
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Message sent to.
     */
    public function to()
    {
        return $this->belongsTo(User::class);
    }
}
