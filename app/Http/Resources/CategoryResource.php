<?php

namespace App\Http\Resources;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(CategoryRequest|Request $request): array
    {
        return [
            "type"=>"category",
            "id"=>$this->id,
            "attributes"=>[
                "name"=>$this->name,
                "created_at"=>$this->created_at,
        "updated_at"=>$this->updated_at,
            ],
            "realtionshsip"=>[


                "posts"=>[
    "data"=>new PostRessource($this->whenLoaded('post')),
    ]






                ],
        ];
    }
}
