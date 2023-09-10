<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
    ];

    /**
     * Get the user (admin/superadmin) who created the news.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessor to get the full path of the image.
     */
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/news/' . $value);
        }
        return null;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
