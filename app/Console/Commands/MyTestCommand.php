<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\admin;
class MyTestCommand extends Command
{protected $signature = 'test';
        public function handle()
    {

        $posts = Post::with('admin','category')->get();
        dd($posts->toArray());
    }
}