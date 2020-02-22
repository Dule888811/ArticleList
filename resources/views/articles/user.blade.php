@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <form action="" id="userArticle" method="GET">
        <div class="form-input">
            <label for="user">user:</label>
            <select id="user" name="user">

                @foreach($users as $user)
                    <option  value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="submit">
        </div>
    </form>
    <ul id="singleArticle">

    </ul>
@stop