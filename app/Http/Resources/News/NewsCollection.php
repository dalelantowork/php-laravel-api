<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'newsCollection' => NewsResource::collection($this->collection),
            'current_page' => $this->resource->currentPage(),
            'total_pages' => $this->resource->lastPage(),
            'total_results' => $this->resource->total()
        ];
    }
}
