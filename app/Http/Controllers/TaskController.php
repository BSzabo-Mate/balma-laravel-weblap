<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:255',
            'description' => 'nullable | string',
            'due_date' => 'nullable | date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'is_done' =>false,
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'is_done' => 'required|boolean',
        ]);

        $task = Task::findOrFail($id);
        $task->is_done = (bool) $validated['is_done'];
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    //JSON adatok a FullCalendarhoz
    public function calendarFeed()
    {
        $tasks = Task::select('id', 'title', 'due_date')->whereNotNull('due_date')->get();

        // FullCalendar JSON formátumot adunk vissza a js-nek
        $events = $tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'title' => $task->title,
                'start' => $task->due_date,
            ];
        });

        return response()->json($events);
    }

    // Dátum frissítése, drag-drop történésekor
    public function updateDate(Request $request, Task $task)
    {
        $request->validate(['due_date' => 'required|date']);
        $task->update(['due_date' => $request->due_date]);
        return response()->json(['success' => true]);
    }

}
