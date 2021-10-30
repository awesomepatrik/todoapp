@extends('layouts.app')

@section('content')
    @if(!auth()->check())
        @livewire('register')
    @else
        @livewire('todo-list')
    @endif

@endsection