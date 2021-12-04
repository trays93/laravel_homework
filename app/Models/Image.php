<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image',
    ];

    /**
     * Get the sender user.
     */
    public function uploader()
    {
        return $this->belongsTo(User::class);
    }
}
