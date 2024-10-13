<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TodoWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['todo'] = Todo::all();
        $data['success'] = session('success');
        return Inertia::render('Dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['todo' => 'required']);
        $todo = Todo::create($request->all());
        session()->flash('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['todo' => 'required']);
        $todo = Todo::findOrFail($id);
        $todo->update($request->only('todo'));
        session()->flash('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        session()->flash('success', 'Deleted successfully!');
    }
}
