<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table ('posts')->insert([
         ['user_id'=>1, 'title'=>"Title of the Post One", 'content'=>"This is the Long Text of the Content One."],
         ['user_id'=>2, 'title'=>"Title of the Post Two", 'content'=>"This is the Long Text of the Content Two."],
         ['user_id'=>3, 'title'=>"Title of the Post Three", 'content'=>"This is the Long Text of the Content Three."]
     ]);
    }
}
