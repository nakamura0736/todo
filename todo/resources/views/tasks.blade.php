@extends('layout')
@section('content')
<div class="container">
<h1>Task List</h1>
<form action="/tasks" method="POST">
  {{ csrf_field() }}
  <div>
    <label>Task</label>
    <div>
      <input type="text" class="form-control" name="name" id="task-name">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Add Task</button>
</form>

<h2>Current Tasks</h2>
<table class="table">
  <thead>
    <th>Task</th><th>&nbsp;</th>
  </thead>
  <tbody>
    @foreach($tasks as $task)
      <tr>
        <td>{{ $task->name }}</td>
        <td>
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