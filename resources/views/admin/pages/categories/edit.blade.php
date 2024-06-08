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
                <form class="form" method="POST" action="{{route('categories.update', $category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên danh mục</label>
                        <input value="{{old('name', $category->name )}}" type="text" class="form-control" name="name" placeholder="Tên danh mục">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Mô tả</label>
                        <input value="{{old('description', $category->description)}}" type="text" class="form-control" name="description" placeholder="Mô tả">
                    </div>

                    <button class="btn btn-success" type="submit">
                        Sửa
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
