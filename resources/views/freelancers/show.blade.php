@extends('app')

@section('content')
    <h1>{{ $freelancer->name }}</h1>

    <article>
        {{ $freelancer->description }}
    </article>

    <hr/>

    @unless($freelancer->fields->isEmpty())
        <h5>Working Fields</h5>
        <ul>
            @foreach($freelancer->fields as $field)
                <li><a href="/fields/{{ $field->name }}">{{ $field->name }}</a></li>
            @endforeach
        </ul>
    @endunless
@endsection