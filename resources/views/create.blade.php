@extends('layouts.app')

@section('title', 'Add Task')

@section('content')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection
<form method="POST" action="{{route('task.store')}}">
    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{old('title')}}"/>
        @error('title')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>

    <div>
    <label for="description">
            Description
        </label>
        <textarea rows="5" text="description" name="description" id="description">{{old('description')}}</textarea>
        @error('description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>

    <div>
    <label for="long_description">
            Long Description
        </label>
        <textarea rows="10" text="long_description" name="long_description" id="long_description"{{old('long_description')}}></textarea>
        @error('long_description')
        <p class="error-message">{{$message}}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Add Task</button>
    </div>
</form>

