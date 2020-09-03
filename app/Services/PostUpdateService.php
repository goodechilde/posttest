<?php

namespace App\Services;

use App\Post;
use App\Http\Requests\PostUpdateRequest;

class PostUpdateService
{
    public function handle(Post $post, PostUpdateRequest $request): Post
    {
        $post->update($request->all());

        return $post;
    }
}
