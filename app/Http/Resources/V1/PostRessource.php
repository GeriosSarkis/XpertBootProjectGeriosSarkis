<?php

namespace App\Http\Resources\V1;

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
                'post_type_id'=>$this->post_type_id



            ],
            "relationships"=>[
                "admin"=>[
                    "data"=> $this->when($this->admin, function () {
                        return AdminResource::collection($this->admin);

                    })  ],
                "category"=>[
                    "data"=>$this->when($this->category_post, function () {
                        return  CategoryResource::collection($this->category_post);

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
