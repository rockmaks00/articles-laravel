<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'patronymic' => $this->patronymic,
            'avatar' => $this->avatar,
            'birthDate' => $this->birth_date,
            'biography' => $this->biography,
            'slug' => $this->slug,
            'articles' => ArticleResource::collection($this->whenLoaded('articles')),
        ];
    }
}
