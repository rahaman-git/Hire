@extends('app')

@section('content')
    <h2 style="text-align: center">Hire a Freelancer</h2>

    <hr/>

    @if(isset($field))
        <h3> {!! $field->name !!} Developers</h3>
    @endif

    <hr/>

    @foreach($freelancers as $freelancer)
        <article>
            <h4><a href="{{ action('FreelancersController@show', [$freelancer->id]) }}" > {{ $freelancer->name }} </a></h4>

            <div class="body">{{ $freelancer->description }}</div>
        </article>
    @endforeach
@stop