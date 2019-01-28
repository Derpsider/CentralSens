@extends('layout')

@section('content')
    <h1 class="title">{{$question->topic}}</h1>

    <div class="content">
        {{ $question->answer }}

        <p> <a href="/questions/{{ $question->id }}/edit">Edit</a></p>

    </div>

    @if ($question->tasks->count())
        <div class = "box">
            @foreach ($question->tasks as $task)
                <div>
                    <form method="POST" action="/tasks/{{$task->id}}">
                        @method('PATCH')
                        @csrf

                        <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            {{ $task->description }}
                        </label>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/questions/{{$question->id }}/tasks" class="box">
        @csrf
        <div class="field">
            <label class="label" for="description">New Task</label>

            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @include('errors')
    </form>
@endsection