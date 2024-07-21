<?php

namespace App\Http\Resources;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostRessource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(PostRequest|Request $request): array
    {
        return [
            "type"=>'posts',
            "id"=>$this->id,
            "attributes"=>[
                "title"=>$this->title,
                "content"=>$this->content,
                "created_at"=>$this->created_at,
                "updated_at"=>$this->updated_at,



            ],
            "relationships"=>[
                "admin"=>[
                    "data"=> $this->when($this->admin, function () {
                        return AdminResource::collection($this->admin);

                    })  ],
                "category"=>[
                    "data"=>$this->when($this->category, function () {
                        return CategoryResource::collection($this->category);

                    })
                ],
                    "media"=>[
                        "data"=>$this->when($this->media, function () {
                            return MediaResouce::collection($this->media);

                        })
                    ]
    ],






        ];
    }
}
