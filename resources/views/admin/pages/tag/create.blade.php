@extends('admin.layouts.admin')

@section('content')
    <div>
        <div>
            <h1 class="card-title">Tạo từ khóa</h1>
        </div>
        @error('errorMessage')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row mt-5">
            <div class="col-6">
                <form class="form" method="POST" action="{{ route('tags.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên từ khóa</label>
                        <input autofocus value="{{ old('name') }}" type="text" class="form-control" name="name"
                            placeholder="Tên từ khóa">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-success" type="submit">
                        Tạo
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
