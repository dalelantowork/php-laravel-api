<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsList = [
            [
                'title' => 'news 1',
                'body' => 'this is the description of our first news',
            ],
            [
                'title' => 'news 2',
                'body' => 'this is the description of our second news',
            ],
            [
                'title' => 'news 3',
                'body' => 'this is the description of our third news',
            ],
        ];

        foreach ($newsList as $news) {
            News::create($news);
        }
    }
}
