@extends('layout')

@section('content')
    <h1 class="title">Change Question</h1>

    <form method="POST" action="/questions/{{ $question->id }}" style="margin-bottom: 1em;">
        @method('PATCH')
        @csrf
        <div class="field">
            <label class="label" for="topic">Topic</label>

            <div class="control">
                <input type="text" class="input" name="topic" placeholder="Topic" value="{{ $question->topic }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="answer">Answer</label>

            <div class="control">
                <textarea name="answer" class="textarea">{{$question->answer}}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Change</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/questions/ {{$question->id}}">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete</button>
            </div>
        </div>
    </form>
@endsection