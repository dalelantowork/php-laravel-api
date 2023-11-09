<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $comments = [
            [
                'news_id' => 1,
                'body' => 'i like this news',
            ],
            [
                'news_id' => 1,
                'body' => 'i have no opinion about that',
            ],
            [
                'news_id' => 1,
                'body' => 'are you kidding me ?',
            ],
            [
                'news_id' => 2,
                'body' => 'this is so true',
            ],
            [
                'news_id' => 2,
                'body' => 'trolololo',
            ],
            [
                'news_id' => 3,
                'body' => 'luke i am your father',
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }
        Schema::enableForeignKeyConstraints();
    }
}
