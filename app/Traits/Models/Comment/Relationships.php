<?php

namespace App\Traits\Models\Comment;

use App\Models\News;

trait Relationships
{
    /**
     * Returns the News model which is related to the Model using this trait.
     *
     * @return \App\Models\News
     */
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
