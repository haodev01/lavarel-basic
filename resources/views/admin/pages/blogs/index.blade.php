@extends('admin.layouts.admin')

@section('content')
<div>
  <div class="d-flex justify-content-end mb-5">
    <a href="{{ route('blogs.create') }}">
      <button class="btn btn-primary btn-lg ">
        Tạo bài viết
      </button>
    </a>
  </div>
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  <div class="card">
    <div class="card-body">
      <h1 class="card-title mb-4">Danh sách bài viết</h1>
      <div class="table-responsive">
        <table class="table ">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Mô tả</th>
              <th>Ảnh</th>
              <th>Ngày tạo</th>
              <th>Ngày sửa</th>
              <th>Hành động</th>
            </tr>
          </thead>
          @if ($blogs->isEmpty())
          <tbody>
            <tr>
              <td>Không có danh mục </td>
            </tr>
          </tbody>
          @else
          <tbody>
            @foreach ($blogs as $blog)
            <tr>
              <td>{{ $blog->id }}</td>
              <td class="text-wrap">{{ $blog->title }}</td>
              <td class="text-wrap">{{ $blog->description }}</td>
              <td>
                <img src="{{Storage::disk('public')->url($blog->thumb)}}" alt="">
              </td>
              <td>{{ formatDate($blog->created_at) }}</td>
              <td>{{ formatDate($blog->updated_at) }}</td>
              <td>
                <div class="d-flex items-center ">
                  <a href="{{ route('blogs.edit', $blog->id) }}" class="mr-2">
                    <button class="btn btn-primary" type="button">
                      Sửa
                    </button>
                  </a>
                  {{-- <button class="btn btn-danger" type="button" data-toggle="modal"
                                                    data-target="#confirmDeleteModal" data-post-id="{{ $blog->id }}">
                  Xóa
                  </button> --}}
                  <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                      Xóa
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
          @endif
        </table>
        {{$blogs->withQueryString()->links('pagination::bootstrap-5')}}
      </div>
    </div>
  </div>
</div>

@endsection