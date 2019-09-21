@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>Edit user</h1>
    <form action="/users/{{ $user->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <p>Name</p><input type="text" name="name" value="{{ $user->name }}">
        <p>Email</p><input type="text" name="email" value="{{ $user->email }}"><br />
        <input type="submit" value="Update User">
    </form>
    <a href="/users/{{ $user->id }}" style="display: inline-block;">Show</a>
    <span> | </span>
    <a href="/users" style="display: inline-block;">Back</a>
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
