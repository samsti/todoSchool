<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index', [
            'todos' => Todo::all(),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
        ]);
        $todo = new Todo();
        $todo->text = $request->input('text');
        $todo->save();
        return redirect('/')->with('status', 'Todo item added successfully!');
    }
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'text' => 'required',
        ]);
        $todo->text = $request->input('text');
        $todo->save();
        return redirect('/')->with('status', 'Todo item updated successfully!');

    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/')->with('status', 'Todo item destroyed successfully!');

    }
}
