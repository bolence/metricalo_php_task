<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreatePost;
use App\Interfaces\BlogInterface;

class ApiBlogsController extends Controller
{

    public function __construct(protected BlogInterface $blogService)
    {
    }
    /**
     * Get all blogs
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->blogService->getAllBlogs();
    }

    /**
     * Create new blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BlogCreatePost $request): \Illuminate\Http\JsonResponse
    {
        return $this->blogService->createBlog($request->validated());
    }

    /**
     * Show single blog
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Blog $blog): \Illuminate\Http\JsonResponse
    {
        return $this->blogService->showSingleBlog($blog->id);
    }

    /**
     * Update a specific blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BlogCreatePost $request, Blog $blog): \Illuminate\Http\JsonResponse
    {
        $this->authorize('update', $blog);
        return $this->blogService->updateBlog($request->validated(), $blog->id);
    }

    /**
     * Delete specific blog
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Blog $blog): \Illuminate\Http\JsonResponse
    {
        $this->authorize('delete', $blog);
        return $this->blogService->deleteBlog($blog->id);
    }
}
