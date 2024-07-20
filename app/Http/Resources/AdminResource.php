<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "type"=>"admin",
            "id"=>$this->id,
            "attribute"=>[
                "email"=>$this->email,
                "password"=>$this->password,
                "username"=>$this->username,
                "phone_number"=>$this->phone_number,
                "email_verified_at"=>$this->email_verified_at,
                "remember_token"=>$this->remember_token,


            ]
        ];
    }
}
