<?php

namespace App\Transformers;

use App\Models\Info;
use League\Fractal\TransformerAbstract;

class InfoTransformer extends TransformerAbstract
{
    /**
     * @param \App\Info $info
     * @return array
     */
    public function transform(Info $info): array
    {
        return [
            'id' => (int) $info->id,
            'title' => (string) $info->title,
            'description' => (string) $info->description,
            'created_at' => (string) $info->created_at,
            'updated_at' => (string) $info->updated_at,
        ];
    }
}
