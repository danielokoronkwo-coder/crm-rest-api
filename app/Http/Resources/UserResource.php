<?php

namespace App\Http\Resources;

use App\Http\Resources\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin \App\Models\User
 */

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "uuid" => $this->uuid,
            "name" => $this->name,
            "email" => $this->email,
            "email_verified_at" => $this->email_verified_at,
            "updated_at" => $this->created_at,
            "created_at" => $this->updated_at,
            "posts" => PostResource::collection($this->whenLoaded('posts'))
        ];
    }
}
