@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' :  'Create Task')

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ isset($task) ? route('tasks.show', ['task' => $task->id]) : route('tasks.index') }}">◄ Go back</a>
    </nav>
    <form method="POST" action="{{ isset($task) ? route('tasks.store', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input
                    @class(['is-invalid' => $errors->has('title')])
                    id="title"
                    name="title"
                    type="text"
                    value="{{ $task->title ?? old('title') }}"
                    placeholder="Enter title"
            >
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea
                    @class(['is-invalid' => $errors->has('description')])
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Enter description"
            >{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea
                    id="long_description"
                    name="long_description"
                    rows="10"
                    placeholder="Enter long description"
            >{{ $task->long_description ??  old('long_description') }}</textarea>
        </div>
        <button type="submit" class="btn">
            @isset($task)
                Update
            @else
                Create
            @endisset
        </button>
    </form>
@endsection
