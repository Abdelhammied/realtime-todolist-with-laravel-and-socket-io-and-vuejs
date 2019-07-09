<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Todo extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id ' => $this->id,
            'todo_name' => $this->todo,
            'todo_status' => $this->status
        ];
    }
}
