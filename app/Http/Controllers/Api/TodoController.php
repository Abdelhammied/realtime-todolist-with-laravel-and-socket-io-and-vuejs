<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Todo as TodoResource;
use App\Todo;
use App\Events\TodoWasCreatedEvent;

class TodoController extends Controller
{
    public function index()
    {
        return TodoResource::collection(Todo::all());
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'todo' => ['required', 'string', 'max:255']
            ]
        );

        $new_todo = Todo::create(
            [
                'todo' => $request->todo,
                'status' => 2
            ]
        );

        event(new TodoWasCreatedEvent($new_todo));

        return response()->json(['status' => 'done'], 200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
