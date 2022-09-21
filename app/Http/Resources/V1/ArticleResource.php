<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'preview' => $this->preview,
            'text' => $this->text,
            'slug' => $this->slug,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'author' => $this->whenLoaded('author'),
            'categories' => CategoryResource::collection($this->whenLoaded('categories'))
        ];
    }
}
