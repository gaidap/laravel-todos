@extends('layouts.app')

@section('title', 'Task - ' . $task->id)

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}">◄ Go back</a>
    </nav>
    <p class="mb-4 text-lg">
        {{ $task->title }}
    </p>
    <p class="mb-4 text-slate-700">
        {{ $task->description }}
    </p>
    @if($task->long_description)
        <p class="mb-4 text-slate-700">
            {{ $task->long_description }}
        </p>
    @endif
    <p class="mb-4">
        @if($task->completed)
            <span class="px-2 py-1 text-xs font-bold text-white bg-green-500 rounded">Completed</span>
        @else
            <span class="px-2 py-1 text-xs font-bold text-white bg-red-500 rounded">Not Completed</span>
        @endif
    </p>
    <p class="mb-4 text-sm text-slate-500">
        Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}
    </p>

    <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit Task</a>
        <form method="POST" action="{{ route('tasks.complete', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">{{ $task->completed ? 'Uncompleted' : 'Complete' }}</button>
        </form>
        <form method="POST" action="{{ route('tasks.delete', ['task' => $task->id]) }}">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete Task</button>
        </form>
    </div>
@endsection
