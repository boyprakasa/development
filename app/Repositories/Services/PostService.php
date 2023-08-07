<?php

namespace App\Repositories\Services;

use App\Repositories\Eloquent\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function savePostData($data)
    {
        return $this->postRepository->save($data);
    }

    public function updatePostData($data, $id)
    {
        return $this->postRepository->update($data, $id);
    }

    public function deletePostData($id)
    {
        return $this->postRepository->delete($id);
    }

    public function restorePostData($id)
    {
        return $this->postRepository->restore($id);
    }

    public function restoreAll()
    {
        return $this->postRepository->restoreAll();
    }
}
