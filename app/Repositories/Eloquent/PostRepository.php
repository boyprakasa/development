<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;

class PostRepository
{

    protected $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function save($data)
    {
        return $this->post->create($data);
    }

    public function update($data, $id)
    {
        return $this->post->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->post->where('id', $id)->delete();
    }

    public function restore($id)
    {
        return $this->post->where('id', $id)->restore();
    }

    public function restoreAll()
    {
        return $this->post->onlyTrashed()->restore();
    }
}
