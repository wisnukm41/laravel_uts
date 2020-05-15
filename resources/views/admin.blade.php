@extends('admin_template')

@section('link')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
@endsection

@section('name','Dashboard')

@section('content')
  @if (session('status'))
    <div class="container">
      <div class="green white-text" style="padding:3px">{{ session('status') }}</div>
    </div>
  @endif
  <div class="row">
    <div class="col s12">
      <table id="table_id">
        <thead>
          <tr>
            <td width="8%">No</td>
            <td>Topic</td>
            <td>Image</td>
            <td width="30%">Description</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @if (!empty($allNews))
              @foreach ($allNews as $news)
                <tr>
                  <td>{{++$i}}</td>
                  <td style="max-width:200px">{{ $news->topic }}</td>
                  <td><img style="height:100px; max-width:250px"  src="{{ asset('assets/img/news').'/'.$news->image }}" ></td>
                  <td style="max-width:450px"><p style="font-size:1rem;word-wrap: break-word;"> {{ trunctString($news->description, 200) }}
                  </p></td>
                  <td>
                    <div class="action__buttons">
                      <a href="/admin/news/edit/{{$news->slug}}" class="waves-effect waves-light btn-small --edit"><i class="material-icons">create</i></a>    
                      <a href="/admin/news/delete/{{$news->slug}}" class="waves-effect waves-light btn-small --delete"><i class="material-icons" onclick="return confirm('Are You Sure?')">delete</i></a>
                    </div>
                  </td>
                </tr>
              @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>

@endsection

@section('js')
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>
@endsection