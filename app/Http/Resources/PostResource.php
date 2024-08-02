<?php

namespace App\Http\Resources;

use App\Http\Requests\PostRequest;
use Filament\Resources\Resource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends Resource
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
            "title"=>$this->title,
                "content"=>$this->content,
                "created_at"=>$this->created_at,
                "updated_at"=>$this->updated_at,










        ];
    }
}
