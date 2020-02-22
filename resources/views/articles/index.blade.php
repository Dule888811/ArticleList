@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div id="articleSingle">
<form action="#" method="GET" id="SingleForm">
    <div class="form-input">
        <label for="title">title:</label>
        <select id="titleSingle" name="title">
            @foreach($articles as $article)
                <option  value="{{$article->id}}">{{$article->title}}</option>
            @endforeach
        </select>
        <input type="submit">
    </div>
</form>
        <ul id="singleArticle">

        </ul>
@stop