@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' :  'Create Task')

@section('styles')
    <style>
        .invalid-feedback {
            display: block;
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.store', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ $task->title ?? old('title') }}"
                placeholder="Enter title"
            >
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                name="description"
                rows="3"
                placeholder="Enter description"
            >{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="long_description">Long Description</label>
            <textarea
                class="form-control"
                id="long_description"
                name="long_description"
                rows="10"
                placeholder="Enter long description"
            >{{ $task->long_description ??  old('long_description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            @isset($task)
                Update
            @else
                Create
            @endisset
        </button>
    </form>
@endsection
