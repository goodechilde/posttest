<?php

namespace App\Services;

use App\Post;
use App\Http\Requests\PostStoreRequest;

class PostStoreService
{
    public function handle(PostStoreRequest $request): Post
    {
        return Post::create($request->all());
    }
}
