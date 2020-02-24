@extends('layouts.app')

@section('content')
    @if(count($errors))
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    @endif
    <div id="storeAricle">
        <form  method="post" action="{{route('article.store')}}" id="upload_form" enctype="multipart/form-data">
            {{csrf_field()}}

            <select name="user_id" id="user_id">
                <option value={{\Auth::id()}}>{{\Auth::id()}}</option>
            </select>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-input">
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>

            <div class="form-input">
            <h2>Your blog</h2>
                <textarea name="blog" id="blog"  rows="4" cols="50"  id="{{\Auth::id()}}">Enter text here...</textarea>
            </div>

            <div class="form-input">
                <label for="main_picture">main picture</label>
                <input type="file" name="main_picture" id="main_picture">
            </div>

            <div class="wrapper" id="divImages">

                <div class="form-input items">
                    <label for="item_image[]">item image</label>
                    <input type="file"  name="item_image[]">
                </div>
                <div class="form-input items" >
                    <label for="item_image[]">item image</label>
                    <input type="file"  name="item_image[]">
                </div>
                <div class="form-input items" >
                    <label for="item_image[]">item image</label>
                    <input type="file"  name="item_image[]">
                </div>
                <div class="form-input items" >
                    <label for="item_image[]">item image</label>
                    <input type="file"  name="item_image[]">
                </div>
                <div class="form-input items">
                    <label for="item_image">item image</label>
                    <input type="file"  name="item_image[]">
                </div>

            </div>
            <a href="" id="photos">
                <i class="fa fa-plus"></i>
            </a>

            <div class="form-input">
                <button type="submit" name="upload" id="upload" value="submit" >Submit</button>
            </div>
        </form>
        <a href ="{{route('home')}}">Main page</a>
    </div>

@stop