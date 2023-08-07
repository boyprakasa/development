<?php

namespace App\Transformers;

use App\Models\Post;
use Illuminate\Support\Str;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    /**
     * @param \App\Post $post
     * @return array
     */
    public function transform(Post $post): array
    {
        return [
            'id' => (int) $post->id,
            'title' => Str::upper($post->title),
            'body' => $post->body,
            'created_at' => $post->created_at->format('d-m-Y'),
            'updated_at' => $post->updated_at->format('d-m-Y'),
        ];
    }
}
