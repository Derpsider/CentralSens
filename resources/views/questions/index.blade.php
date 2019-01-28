@extends('layout')

@section('content')
    <h1 class="title">Questions</h1>
    <ul>
        @foreach ($questions as $question)
            <li>
                <a href="/questions/{{ $question->id }}">
                    {{$question->topic}}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>