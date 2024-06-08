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
<h2>
    {{$task->created_at}}
</h2>
<h2>
    {{$task->updated_at}}
</h2>

<div>
    <a href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
</div>
<div>
    <form method="POST" action="{{route('tasks.toggle-complete', ['task' => $task])}}">
        @csrf
        @method('PUT')
        <button type="submit">
            Mark as {{$task->completed ? 'not completed' : 'completed'}}
        </button>

    </form>
</div>
<div>
    <form method="POST" action="{{route('tasks.destroy', ['task' => $task])}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>

    </form>
</div>
@endsection