@extends('layouts.app')

@section('title', 'Laravel Todo List')

@section('content')
    @isset($tasks)
        <div>
            <ul>
                @forelse ($tasks as $task)
                    <li><a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a></li>
                @empty
                    <li>No tasks available!</li>
                @endforelse
            </ul>
        </div>
    @endisset
    <a href="{{ route('tasks.create') }}">Add Task</a>
@endsection
