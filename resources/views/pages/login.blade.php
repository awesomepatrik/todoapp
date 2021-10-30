@extends('layouts.app')

@section('content')
    @if(!auth()->check())
        @livewire('login')
    @else
        @livewire('todo-list')
    @endif
@endsection