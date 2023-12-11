@extends('layouts.app')

@section('title', 'Task - ' . $task->id)

@section('content')
<div>
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
       Created At: {{ $task->created_at }}
    </p>
    <p>
       Updated At: {{ $task->updated_at }}
    </p>
</div>
@endsection
