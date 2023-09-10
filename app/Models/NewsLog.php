<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'action',
    ];

    /**
     * Get the news associated with the log.
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
