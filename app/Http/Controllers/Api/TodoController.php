<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::where('user', auth('sanctum')->user()->id)->get();

        return response()->json([
            'todos' => $todos,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Missing parameters',
                'errors' => $validator->errors(),
            ], 400);
        }

        $todo = Todo::create([
            'user' => auth('sanctum')->user()->id,
            'title' => $request->get('title'),
            'color' => '#212529',
        ]);

        return response()->json([
            'message' => 'Todo created successfully',
            'todo' => $todo->fresh()
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response()->json([
            'todo' => $todo
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {

         $validator = Validator::make($request->all(), [
            'title' => 'required',
            'color' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Missing parameters',
                'errors' => $validator->errors(),
            ], 400);
        }

        $todo->title = $request->get('title');
        $todo->color = $request->get('color');
        $todo->save();

        return response()->json([
            'message' => 'Todo updated'
        ], 200);
    }

    public function complete($id)
    {
        //
        $todo = Todo::where('id', $id)->first();
        $todo->completed = !$todo->completed;
        $todo->save();

        return response()->json([
            'message' => 'Todo completed'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json([
            'message' => 'Todo removed'
        ], 200);
    }
}
