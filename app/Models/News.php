<?php

namespace App\Models;

use App\Traits\Models\News\Accessors;
use App\Traits\Models\News\Mutators;
use App\Traits\Models\News\Relationships;
use App\Traits\Models\News\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
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
        'title',
        'body'
    ];
}
