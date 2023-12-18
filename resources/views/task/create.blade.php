@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
    </form>
@endsection
