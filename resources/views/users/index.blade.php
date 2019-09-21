@extends('layouts.layouts')

@section('header')
    @component('components.header')
    @endcomponent
@endsection

@section('main')
    <h1>Listing users</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ( $users as $user )
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="/users/{{ $user->id }}" style="display: inline-block;">
                    Show</a></td>
                <td><a href="/users/{{ $user->id}}/edit" style="display: inline-block;">
                    Edit</a></td>
                <form action="/users/{{ $user->id }}" id="form_{{ $user->id }}"
                    method="post" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                <td><a href="#" data-id="{{ $user->id }}" onclick="deletePost(this);">Destroy</a></td>
                </form>
                <script>
                    function deletePost(e) {
                        'use strict';
                        if (confirm('are you sure?')) {
                            document.getElementById('form_' + e.dataset.id).submit();
                        }
                    }
                </script>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br />
    <a href="/users/create">New User</a>
@endsection

@section('sidebar')
    @component('components.sidebar')
    @endcomponent
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection
