<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Post;
use App\Services\PostIndexService;
use App\Services\PostStoreService;
use App\Services\PostUpdateService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * @group  Post management
 *
 * APIs for managing Post
 */

class PostController extends Controller
{
    /**
     * Sets authorization for all resources on this class
     * uncomment authorizationResource to enable the Policy
     *
     */
    public function __construct()
    {
//        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the post resource.
     * @queryParam sort Field to sort by. Defaults to 'id'.
     * @queryParam fields[post] Comma-separated fields to include in the response
     * @queryParam filters[INSERTFILTER] Filter by INSERTFILTER.
     * @queryParam include Include related information, accepted values .
     *
     * @param PostIndexService $service
     * @return AnonymousResourceCollection
     */
    public function index(PostIndexService $service): AnonymousResourceCollection
    {
        $post = $service->handle();
        return PostResource::collection($post);
    }


    /**
     * Store a newly created post resource in storage.
     *
     * @param PostStoreRequest $request
     * @param PostStoreService $service
     * @return PostResource
     */
    public function store(
            PostStoreRequest $request,
            PostStoreService $service
        ): PostResource
    {
        $post = $service->handle($request);
        return new PostResource(
            $post
        );
    }

    /**
     * Display the specified post resource.
     *
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource(
            $post
        );
    }

    /**
     * Update the specified post resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param PostUpdateService $service
     * @param Post $post
     * @return PostResource
     */
    public function update(
            PostUpdateRequest $request,
            PostUpdateService $service,
            Post $post
        ): PostResource
    {
        $post = $service->handle($post, $request);
        return new PostResource(
            $post
        );
    }

    /**
     * Remove the specified post resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post): Response
    {
        $post->delete();
        return noContent();
    }
}
