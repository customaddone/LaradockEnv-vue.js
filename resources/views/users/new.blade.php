@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>New user</h1>
    <form action="/users" method="post">
        <!-- csrf置かないとNo messageが出る-->
        {{ csrf_field() }}
        <p>Name</p><input type="text" name="name" value="{{ old('name') }}">
        <p>Email</p><input type="text" name="email" value="{{ old('email') }}"><br />
        <input type="submit" value="Create User">
    </form>
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
