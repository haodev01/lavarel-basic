@extends('admin.layouts.admin')

@section('content')
    <div>
        <div>
            <h1 class="card-title">Sửa danh mục</h1>
        </div>
        @error('errorMessage')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="row mt-5">
            <div class="col-6">
                <form class="form" method="POST" action="{{route('tags.update', $tag->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên danh mục</label>
                        <input value="{{old('name', $tag->name )}}" type="text" class="form-control" name="name" placeholder="Tên danh mục">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <button class="btn btn-success" type="submit">
                        Sửa
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
