@extends('admin.layouts.admin')

@section('content')
<div>
  <div>
    <h1 class="card-title">Tạo bài viêt</h1>
  </div>
  @error('errorMessage')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <div class="row mt-5">
    <div class="col-6">
      <form class="form" method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputUsername1">Tiêu đề</label>
          <input autofocus value="{{ old('title') }}" type="text" class="form-control" name="title" placeholder="Tiêu đề bài viết">
          @error('title')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputUsername1">Mô tả</label>
          <input autofocus value="{{ old('description') }}" type="text" class="form-control" name="description" placeholder="Tiêu đề bài viết">
          @error('description')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label>Từ khóa</label>
          <select value="{{old('tags[]')}}" class="js-example-basic-multiple" multiple="multiple" style="width:100%" name="tags[]">
            @foreach ($tags as $tag )
            <option value="{{$tag->id}}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'selected' : '' }}>{{$tag->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="thumb" maxlength="1" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" onchange="handleUploadImage">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
          </div>

        </div>
        <button class="btn btn-success" type="submit">
          Tạo
        </button>
      </form>
    </div>
  </div>
</div>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>
@endsection