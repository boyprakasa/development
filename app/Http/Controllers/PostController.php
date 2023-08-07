<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Repositories\Services\PostService;
use App\Transformers\PostTransformer;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{

    protected $postService;

    public function __construct()
    {
        $this->postService = new PostService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DataTables::eloquent(Post::query())
            ->setTransformer(PostTransformer::class)
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $this->postService->savePostData($data);
            DB::commit();
            return successResponse('Post created successfully', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return errorResponse('Something went wrong', 500, $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return successResponse('Post fetched successfully', $post, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return successResponse('Post fetched successfully', $post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $this->postService->updatePostData($data, $post->id);
            DB::commit();
            return successResponse('Post updated successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return errorResponse('Something went wrong', 500, $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();
        try {
            $this->postService->deletePostData($post->id);
            DB::commit();
            return successResponse('Post deleted successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            // return errorResponse('Something went wrong', 500, $th->getMessage());
        }
    }

    public function restore($id)
    {
        DB::beginTransaction();
        try {
            $this->postService->restorePostData($id);
            DB::commit();
            return successResponse('Post restored successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            // return errorResponse('Something went wrong', 500, $th->getMessage());
        }
    }

    public function restoreAll()
    {
        DB::beginTransaction();
        try {
            Post::onlyTrashed()->restore();
            // $this->postService->restoreAll();
            DB::commit();
            return successResponse('All posts restored successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            // return errorResponse('Something went wrong', 500, $th->getMessage());
        }
    }
}
