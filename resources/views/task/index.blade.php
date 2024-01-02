@extends('layouts.app')

@section('title', 'Laravel Todo List')

@section('content')
    @isset($tasks)
        <nav class="mb-4"><a class="link" href="{{ route('tasks.create') }}">Add Task</a></nav>
        <div>
            <ul>
                @forelse ($tasks as $task)
                    <li class="mb-2">
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['font-medium', 'line-through' => $task->completed])>
                            {{ $task->title }}
                        </a>
                    </li>
                @empty
                    <li>No tasks available!</li>
                @endforelse
            </ul>
        </div>
        @if ($tasks->count())
            <nav class="mt-4">
                {{ $tasks->links() }}
            </nav>
        @endif
    @endisset
@endsection
