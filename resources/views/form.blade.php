@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
<form method="POST" action="{{isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}">
    @csrf
    @isset($task)
    @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="title">
            Title
        </label>
        <input text="text" name="title" id="title" value="{{ $task->title ?? old('title')}}" 
               @class(['border-red-500' => $errors->has('title')])/>
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
    <label for="description">
            Description
        </label>
        <textarea rows="5" text="description" name="description" id="description"
                  @class(['border-red-500' => $errors->has('description')])>
            {{ $task->description ?? old('description')}}
        </textarea>
        @error('description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-4">
    <label for="long_description">
            Long Description
        </label>
        <textarea rows="10" text="long_description" name="long_description" id="long_description" 
                  @class(['border-red-500' => $errors->has('long_description')])>
            {{ $task->long_description ?? old('long_description')}}
        </textarea>
        @error('long_description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>

    <div class="gap-2 flex">
        <button class="btn" type="submit">
            @isset($task) 
            Update Task 
            @else 
            Add Task
            @endisset
        </button>
        <a class="btn" href="{{route('tasks.index')}}">Cancel</a>
    </div>
</form>


