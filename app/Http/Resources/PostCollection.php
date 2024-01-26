<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{

    public function toArray(Request $request)
    {
        return $this->collection->map(function ($item){
            return [
                'id' => $item->_id,
                'title'=> $item->_source->title,
                'content'=> $item->_source->content,
                'publish_date_time'=> $item->_source->publish_date_time,
                'status'=> $item->_source->status,
                'created_at'=> $item->_source->created_at,
                'updated_at'=> $item->_source->updated_at
            ];
        });
    }
}
