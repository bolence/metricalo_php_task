<?php

namespace App\Interfaces;


interface BlogInterface
{

    /**
     * Get all blogs
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBlogs(): \Illuminate\Http\JsonResponse;


    /**
     * Create new blog
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBlog(array $request): \Illuminate\Http\JsonResponse;


    /**
     * Show single blog
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showSingleBlog(int $id): \Illuminate\Http\JsonResponse;


    /**
     * Update a blog
     *
     * @param Request $request
     * @param integet $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBlog(array $request, int $id): \Illuminate\Http\JsonResponse;


    /**
     * Delete a blog
     *
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBlog(int $id): \Illuminate\Http\JsonResponse;
}
