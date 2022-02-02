<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->insert([
        //     'title' => "toto",
        //     'body' => "titi",
        // ]);
        Article::factory()
                ->count(10)
                ->has(Comment::factory()->count(3))
                ->create();
  
    }
}
