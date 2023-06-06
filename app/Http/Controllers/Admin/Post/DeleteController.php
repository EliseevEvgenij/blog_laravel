<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)  // так как в роуте (Route::get('/{post}')
    {
        
        $post->delete();
        return redirect()->route('admin.post.index'); //путь майн/индексблэйд
    }

}