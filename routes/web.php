<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function ()  {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(3)
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('tasks/{task}', function (Task $task){
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('tasks/{task}/edit', function (Task $task){
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::post('/task', function(TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task created Successfully!');
})->name('tasks.store');

Route::put('/task/{task}', function(Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task updated Successfully!');

})->name('tasks.update');

Route::delete('task/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')
    ->with('success', 'Task Deleted Succesfully');

})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function(Task $task){
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task Updated Successfully');
})->name('tasks.toggle-complete');


Route::fallback(function () {
    return 'Url Not Found';
});