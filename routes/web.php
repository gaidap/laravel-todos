<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', static function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', static function () {
    return view('task/index', [
        'tasks' => Task::latest()->where('completed', false)->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}/edit', static function (Task $task) {
    return view('task/edit', [
        'task' => $task,
    ]);
})->where('task', '[0-9]+')->name('tasks.edit');

Route::get('/tasks/{task}', static function (Task $task) {
    return view('task/show', [
        'task' => $task,
    ]);
})->where('task', '[0-9]+')->name('tasks.show');

Route::view('/tasks/create', 'task/create')->name('tasks.create');

Route::match(['post', 'put'], '/tasks/{task?}', static function (?Task $task, TaskRequest $request) {
    $validated = $request->validated();
    $validated['long_description'] = request('long_description');

    if ($task?->id === null) {
        $task = Task::create($validated);

        return redirect()
            ->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully.')
        ;
    }
    if (!$task->update($validated)) {

        return response()->json([
            'message' => 'Task could not be updated.',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    return redirect()
        ->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully.')
    ;
})->where('task', '[0-9]*')->name('tasks.store');

Route::delete('/tasks/{task}', static function (Task $task) {
    if (!$task->delete()) {

        return response()->json([
            'message' => 'Task could not be deleted.',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    return redirect()
        ->route('tasks.index')
        ->with('success', 'Task deleted successfully.')
    ;
})->where('task', '[0-9]+')->name('tasks.delete');
