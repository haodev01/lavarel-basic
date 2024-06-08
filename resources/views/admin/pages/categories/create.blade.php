@extends('admin.layouts.admin')

@section('content')
    <div>
        <div>
            <h1 class="card-title">Tạo danh mục</h1>
        </div>
        @error('errorMessage')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="row mt-5">
            <div class="col-6">
                <form class="form" method="POST" action="{{route('categories.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên danh mục</label>
                        <input autofocus value="{{old('name')}}" type="text" class="form-control" name="name" placeholder="Tên danh mục">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Mô tả</label>
                        <input value="{{old('description')}}" type="text" class="form-control" name="description" placeholder="Mô tả">
                    </div>
                    <div class="form-group">
                        <label>Danh mục cha</label>
                        <select class="js-example-basic-multiple" multiple="multiple" style="width:100%">
                          <option value="AL">Alabama</option>
                          <option value="WY">Wyoming</option>
                          <option value="AM">America</option>
                          <option value="CA">Canada</option>
                          <option value="RU">Russia</option>
                        </select>
                      </div>

                    <button class="btn btn-success" type="submit">
                        Tạo
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
