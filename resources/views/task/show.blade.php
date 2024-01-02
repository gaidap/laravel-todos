@extends('layouts.app')

@section('title', 'Task - ' . $task->id)

@section('content')
    <p>
        Title: {{ $task->title }}
    </p>
    <p>
        Description: {{ $task->description }}
    </p>
    @if($task->long_description)
        <p>
            Long Description: {{ $task->long_description }}
        </p>
    @endif
    <p>
        Completed: {{ $task->completed ? 'Yes' : 'No' }}
    </p>
    <p>
        Created At: {{ $task->created_at }}
    </p>
    <p>
        Updated At: {{ $task->updated_at }}
    </p>
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit Task</a>
    <div>
        <form method="POST" action="{{ route('tasks.complete', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit">{{ $task->completed ? 'Uncompleted' : 'Complete' }}</button>
        </form>
    </div>
    <div>
        <form method="POST" action="{{ route('tasks.delete', ['task' => $task->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Task</button>
        </form>
    </div>
@endsection
