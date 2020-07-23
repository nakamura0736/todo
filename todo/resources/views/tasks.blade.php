@extends('layout')
@section('content')
<div class="container">
<h1>Task List</h1>
<div class="mb-4">
  <form action="/tasks" method="POST">
    {{ csrf_field() }}
    <div>
      <label>Task</label>
      <div class="mb-2">
        <input type="text" class="form-control" name="name" id="task-name">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Task</button>
  </form>
</div>

<h2>Current Tasks</h2>
<table class="table">
  <thead>
    <tr>
      <th class="col-8">Task</th>
      <th class="col-4">&nbsp;</th>
    <tr>
  </thead>
  <tbody>
    @foreach($tasks as $task)
      <tr>
        <td >{{ $task->name }}</td>
        <td >
          <form action="/tasks/{{$task->id}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection