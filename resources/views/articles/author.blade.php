@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div id="authorAuthor">
        <form action="#" method="GET" id="authorForm">
            <div class="form-input">
                <label for="title">title:</label>
                <select id="authorSingle" name="titleSingle">
                    @foreach($articles as $article)
                        <option  value="{{$article->id}}">{{$article->title}}</option>
                    @endforeach
                </select>
                <input type="submit">
            </div>
        </form>
        <ul id="author">

        </ul>
        <a href ="{{route('home')}}">Main page</a>
    </div>
@stop