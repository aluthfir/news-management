<?php

namespace App\Observers;

use App\Models\News;
use App\Models\NewsLog;
use Illuminate\Support\Facades\Log;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function created(News $news)
    {
        NewsLog::create([
            'news_id' => $news->id,
            'action' => 'created'
        ]);
    }

    /**
     * Handle the News "updated" event.
     */
    public function updated(News $news)
    {
        NewsLog::create([
            'news_id' => $news->id,
            'action' => 'updated'
        ]);
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news)
    {
        NewsLog::create([
            'news_id' => $news->id,
            'action' => 'deleted'
        ]);
    }

    /**
     * Handle the News "restored" event.
     */
    public function restored(News $news)
    {
        NewsLog::create([
            'news_id' => $news->id,
            'action' => 'restored'
        ]);
    }

    /**
     * Handle the News "force deleted" event.
     */
    public function forceDeleted(News $news)
    {
        NewsLog::create([
            'news_id' => $news->id,
            'action' => 'force deleted'
        ]);
    }
}
