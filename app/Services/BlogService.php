<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Services\GlobalService;
use App\Interfaces\BlogInterface;


class BlogService extends GlobalService implements BlogInterface
{

    /**
     * Get all blogs
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBlogs(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'blogs' => Blog::all()
        ], 200);
    }

    /**
     * Create a new blog
     *
     * @param array $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBlog(array $request): \Illuminate\Http\JsonResponse
    {
        $data = $request;
        $data['blog_slug'] = $data['blog_slug'] ? $data['blog_slug'] : Str::slug($data['blog_title']);

        try {
            $blog = Blog::create($data);
        } catch (\Throwable $th) {
            $this->logError('Error during creating a new blog', $th);
            return response()->json([
                'message' => 'Error occured during creating a new blog'
            ], 400);
        }

        info('Blog created ' . json_encode($blog));

        return response()->json([
            'message' => 'Blog created'
        ], 200);
    }

    /**
     * Show single blog
     *
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showSingleBlog(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'blog' => Blog::findOrFail($id)
        ], 200);
    }

    /**
     * Update blog
     *
     * @param array $request
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBlog(array $request, int $id): \Illuminate\Http\JsonResponse
    {
        $data = $request;
        $data['blog_slug'] = $data['blog_slug'] ? $data['blog_slug'] : Str::slug($data['blog']);

        $blog = Blog::findOrFail($id);

        try {
            $blog->update($data);
        } catch (\Throwable $th) {
            $this->logError('Error during creating a blog', $th);
            return response()->json([
                'message' => 'Error occured during creating a new blog'
            ], 400);
        }

        return response()->json([
            'blog' => $blog,
            'message' => 'Blog updated successfully'
        ], 200);
    }

    /**
     * Delete blog
     *
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBlog(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            Blog::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            $this->logError('Error during deleting a blog', $th);
            return response()->json([
                'message' => 'Error occured during deleting a new blog'
            ], 400);
        }

        return response()->json([
            'message' => 'Blog deleted successfully'
        ], 200);
    }
}
