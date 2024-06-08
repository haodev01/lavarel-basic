@extends('admin.layouts.admin')

@section('content')
    <div>
        <div class="d-flex justify-content-end mb-5">
            <a href="{{ route('categories.create') }}">
                <button class="btn btn-primary btn-lg ">
                    Tạo danh mục
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
                <h1 class="card-title mb-4">Danh sách danh mục</h1>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Slug</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        @if ($categories->isEmpty())
                            <tbody>
                                <tr>
                                    <td>Không có danh mục </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ formatDate($category->created_at) }}</td>
                                        <td>{{ formatDate($category->updated_at) }}</td>
                                        <td>
                                            <div class="d-flex items-center ">
                                                <a href="{{ route('categories.edit', $category->id) }}" class="mr-2">
                                                    <button class="btn btn-primary" type="button">
                                                        Sửa
                                                    </button>
                                                </a>
                                                {{-- <button class="btn btn-danger" type="button" data-toggle="modal"
                                                    data-target="#confirmDeleteModal" data-post-id="{{ $category->id }}">
                                                    Xóa
                                                </button> --}}
                                                <form method="POST"
                                                    action="{{ route('categories.destroy', $category->id) }}">
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
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade " id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận Xóa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa mục này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Xác nhận</button>
                </div>
            </div>
        </div>
    </div> --}}
    
@endsection
