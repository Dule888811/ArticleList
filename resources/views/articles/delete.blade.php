@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div class="centerArticle">
    <form action="{{route('articles.destroy',$id)}}" method="post" id="deleteA">
        {{csrf_field()}}
        <div class="form-input">
            <label class="labelDelete"   for="user">Are you sure you whant to delete this blog?</label>
            <select hidden="hidden" class="delAr">
                <option value="{{$id}}" selected></option>
            </select>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @csrf
            @method('DELETE')
            <input type="submit">
        </div>
    </form>
    <a href ="{{route('home')}}">Main page</a>
    </div>
@endsection