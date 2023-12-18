@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title') }}"
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
            >{{ old('description') }}</textarea>
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
            >{{ old('long_description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
