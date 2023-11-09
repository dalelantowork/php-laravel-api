<?php

namespace App\Traits\Models\News;

use App\Models\Comment;

trait Relationships
{
    /**
     * Returns the Comment model which is related to the Model using this trait.
     *
     * @return \App\Models\Comment
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
