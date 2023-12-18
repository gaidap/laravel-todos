<?php

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
        'tasks' => Task::latest()->where('completed', false)->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', static function ($id) {
    return view('task/show', [
        'task' => Task::findOrFail($id),
    ]);
})->where('id', '[0-9]+')->name('tasks.show');

Route::view('/tasks/create', 'task/create')->name('tasks.create');

Route::post('/tasks', static function () {
    $task = new Task();
    $task->title = request('title');
    $task->description = request('description');
    $task->long_description = request('long_description');
    $task->save();

    return redirect()->route('tasks.index');
})->name('tasks.store');
