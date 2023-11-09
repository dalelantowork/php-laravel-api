<?php

namespace App\Models;

use App\Traits\Models\Comment\Accessors;
use App\Traits\Models\Comment\Mutators;
use App\Traits\Models\Comment\Relationships;
use App\Traits\Models\Comment\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use Accessors;
    use Mutators;
    use Relationships;
    use Scopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'news_id',
        'body'
    ];
}
