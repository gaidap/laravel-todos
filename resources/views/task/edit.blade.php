@extends('layouts.app')

@section('title', 'Edit Task')

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
    <form method="POST" action="{{ route('tasks.store', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ $task->title }}"
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
            >{{ $task->description  }}</textarea>
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
            >{{ $task->long_description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">Cancel</a>
    </form>
@endsection
