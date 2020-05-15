@extends('template')

@section('title','Home')  

@section('content')

  <div class="carousel">
    @foreach ($carousels as $item)
      <div class="carousel-item white-text" style="background:url(/assets/img/news/{{$item->image}});background-size:cover;">
        <a href="/news/{{$item->slug}}"><h4 class="carousel__link">{{ $item->topic }}</h4></a>
        <p class="white-text carousel__date">{{ dateFormat($item->created_at) }}</p>
      </div>
    @endforeach
  </div>
  
  <div class="news__cards">
    <h4 class="center">Berita Terbaru</h4>
  </div>
  <div class="row">
    @foreach ($allNews as $news)
    <div class="col s6 m4">
      <div class="card medium">
        <div class="card-image">
          <img src="/assets/img/news/{{$news->image}}">
          <span class="card-title --card__topic">{{ trunctString($news->topic, 60) }}</span>
        </div>
        <div class="card-content">
          {{ trunctString($news->description, 80) }}
        </div>
        <div class="card-action --flex">
          <span class="left">{{ dateFormat($news->created_at) }}</span>
          <a href="/news/{{$news->slug}}" class="right white-text blue waves-effect waves-light btn-small">Selengkapnya</a>
        </div>
      </div>
    </div>
    @endforeach 
  </div>
    <div class="center">
      {{ $allNews->links('pagedefault') }}
    </div>
@endsection

@section('js')
  <script>

$('.carousel').carousel({
   duration: 300, 
    padding: 300,
    dist: -450,    
});
autoplay();
function autoplay() {
    $('.carousel').carousel('prev');
    setTimeout(autoplay, 4500);
}
    </script>
@endsection