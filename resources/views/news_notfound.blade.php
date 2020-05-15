@extends('template')

@section('title','News Not Found!')
    

@section('content')
        <div class="row">
            <div class="col m8 s12">
                <h2>News Not Found!</h2>
            </div>
            <div class="col m4 s12">
                <h5>Other News</h5>
                @foreach ($allNews as $fewNews)  
                    <div class="card medium">
                        <div class="card-image">
                            <img src="/assets/img/news/{{ $fewNews->image }}">
                            <span class="card-title --card__topic">{{ trunctString($fewNews->topic, 60) }}</span>
                        </div>
                        <div class="card-content --news__new">
                            {{ trunctString($fewNews->description, 80) }}
                        </div>
                        <div class="card-action --flex">
                            <span class="left">{{ dateFormat($fewNews->created_at) }}</span>
                            <a href="/news/{{$fewNews->slug}}" class="right white-text blue waves-effect waves-light btn-small">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection