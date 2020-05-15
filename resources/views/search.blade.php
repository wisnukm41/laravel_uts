@extends('template')

@section('title','Search Result')

@section('content')
    <div class="result">
        <h3>Result Of " {{ $value }} "</h3>
        <div class="row">
            @foreach ($results as $result)
            <div class="col s6 m4">
                <div class="card medium">
                <div class="card-image">
                    <img src="/assets/img/news/{{$result->image}}">
                    <span class="card-title --card__topic">{{ trunctString($result->topic, 60) }}</span>
                </div>
                <div class="card-content">
                    {{ trunctString($result->description, 80) }}
                </div>
                <div class="card-action --flex">
                    <span class="left">{{ dateFormat($result->created_at) }}</span>
                    <a href="/news/{{$result->slug}}" class="right white-text blue waves-effect waves-light btn-small">Selengkapnya</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="center">
        {{ $results->links('pagedefault') }}
    </div>
@endsection