<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TodoController
{
    public function index()
    {
        $todos = Todo::all();
        if ($todos->isEmpty()) {
            return response()->json([
                'status' => 204,  
                'message' => 'No todos found',
                'data' => []
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'data' => $todos,
                'message' => 'Todos retrieved successfully',
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate(['todo' => 'required']);

        try {
            $todo = Todo::create($request->all());
            return response()->json([
                'status' => 201,
                'message' => 'Todo created successfully',
                'data' => $todo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,  
                'message' => 'Failed to create todo',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show(Todo $todo = null)
    {
        if (!$todo) {
            return response()->json([
                'status' => 404,
                'message' => 'Todo not found',
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Todo retrieved successfully',
                'data' => $todo
            ]);
        }
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate(['todo' => 'required']);

        if (!$todo) {
            return response()->json([
                'status' => 404,
                'message' => 'Todo not found',
            ]);
        } else {
            $todo->update($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Todo updated successfully',
                'data' => $todo
            ]);
        }
    }

    public function destroy(Todo $todo)
    {
        if (!$todo) {
            return response()->json([
                'status' => 404,
                'message' => 'Todo not found',
            ]);
        } else {
            $todo->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Todo deleted successfully'
            ]);
        }
    }

}
