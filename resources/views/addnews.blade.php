@extends('admin_template')

@section('name','Add News')
    
@section('content')
    <div class="container">
        <div class="row">
          <form action="{{ route('post-news') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input-field col s12">
                  <input id="topic" type="text" class="validate" name="topic" required data-length="80" maxlength="80" value="{{old('topic')}}">
                  <label for="topic">Topic</label>
                  @if ($errors->has('topic'))
                    <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('topic') }}</span>
                  @endif 
              </div>
              <div class="col s12">
                  <label for="description" style="font-size:1em">Description</label>
                  <textarea name="description" id="descriptiton" class="summernote" required>{{old('description')}}</textarea>
                  @if ($errors->has('description'))
                    <span class="helper-text red" data-error="wrong" data-success="right">{{ $errors->first('description') }}</span>
                  @endif 
              </div>
              <div class="col s6">
                <div class="file-field input-field">
                  <div class="btn blue">
                    <span>Image</span>
                    <input type="file" id="image" name="image" required>
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
                <small class="helper-text" data-error="wrong" data-success="right">Max Size 3MB, Image Only</small>
                @if ($errors->has('image'))
                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('image') }}</span>
              @endif 
              </div>
              <div class="col s6 center">
                <label for="image">
                  <img class="img__preview" src="{{ asset('assets/img/nopreview.png') }}" alt="preview_image" id="imagePreview">
                </label>
              </div>
              <button class="btn waves-effect blue waves-light" type="submit" name="action">Upload
                <i class="material-icons right">send</i>
              </button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $("#imagePreview").attr("src", e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#image").change(function() {
        readURL(this);
      });

      $(document).ready(function() {
        $('.summernote').summernote({
          height:300,
          tabsize: 2,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
          ]
        });
      });
    </script>
@endsection