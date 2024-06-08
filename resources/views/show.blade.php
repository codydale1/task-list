@extends('layouts.app')

@section('title', $task->title)
@section('content')
<h1>
    {{$task->title}}
</h1>
<h2>
    {{$task->description}}
</h2>
<h2>
    {{$task->long_description}}
</h2>
@endsection