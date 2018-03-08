<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ResidentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'count' => array(
                'population' => $this->collection->count(),                 
                'male' => $this->collection->where('gender', 'male')->count(),                 
                'female' => $this->collection->where('gender', 'female')->count(),                 
                'undefined' => $this->collection->where('gender', null)->count(),                 
            ),
            'data' => $this->collection,
        ];
    }
}
