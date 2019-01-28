@extends('layout')

@section('content')
<h1 class="title">Make a new Questions</h1>
<form method="POST" action="/questions">
    {{csrf_field() }}

    <!-- current issue: is danger appears on both spots even though it could only be one -->
    <div class="field">
        <label class="label" for="topic"> Question Topic</label>
            <div class="control">
                <input type="text" name="topic" placeholder="Question topic" class="input {{ $errors->has('topic') ? 'is-danger' : ''}}" value="{{ old('topic') }}" required>
            </div>
    </div>

    <div class="field">
        <label class="label" for="answer">Question Answer</label>
            <div class="control">
                <textarea name="answer" placeholder="Question answer" class="textarea {{ $errors->has('topic') ? 'is-danger' : ''}}" required>{{ old('topic') }}</textarea>
            </div>
    </div>

    <div class="field">
        <div class="control">
        <button type="submit" class="button is-link">Make Question</button>
        </div>
    </div>


    @include ('errors')
</form>
@endsection