<?php

use Database\Fixtures\TaskData;
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
        'tasks' => TaskData::getTasks(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', static function ($id) {
    $selectedTask = collect(TaskData::getTasks())->firstWhere('id', $id);
    if ($selectedTask === null) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('task/show', [
        'task' => $selectedTask,
    ]);
})->where('id', '[0-9]+')->name('tasks.show');
