@extends('template')

@section('title',$news->topic)
    

@section('content')
        <div class="row">
            <div class="col m8 s12">
                <div class="news__img" style="background-image:url(/assets/img/news/{{ $news->image }})"></div>
                <div class="news__details">
                    <h3 class="news__details">{{ $news->topic }}</h3>
                    <div class="news__time --flex --right"><i class="small material-icons">access_time</i>{{ dateFormat($news->created_at) }}</div>
                    <div class="news__desc">{!! $news->description !!}</div>
                </div>
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