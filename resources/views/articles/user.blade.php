@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="centerArticle">
    <form action="" id="userArticle" method="GET">
        <div class="form-input">
            <label for="user">user:</label>
            <select id="user" name="user">

                @foreach($users as $user)
                    <option  value="{{$user->id}}">{{$user->name}}</option>
                    <hr class="hrArticle">
                @endforeach
            </select>
            <input type="submit">
        </div>
        <a href ="{{route('home')}}">Main page</a>
    </form>
    <ul id="userAr">

    </ul>
    </div>
@stop