@extends('admin.layouts.admin')

@section('content')
    <div>
        <div class="d-flex justify-content-end mb-5">
            <a href="{{ route('tags.create') }}">
                <button class="btn btn-primary btn-lg ">
                    Tạo từ khóa
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
                <h1 class="card-title mb-4">Danh sách từ khóa </h1>
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
                        @if ($tags->isEmpty())
                            <tbody>
                                <tr>
                                    <td>Chưa có từ khóa nào </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>{{ formatDate($tag->created_at) }}</td>
                                        <td>{{ formatDate($tag->updated_at) }}</td>
                                        <td>
                                            <div class="d-flex items-center ">
                                                <a href="{{ route('tags.edit', $tag->id) }}" class="mr-2">
                                                    <button class="btn btn-primary" type="button">
                                                        Sửa
                                                    </button>
                                                </a>
                                                {{-- <button class="btn btn-danger" type="button" data-toggle="modal"
                                                    data-target="#confirmDeleteModal" data-post-id="{{ $tag->id }}">
                                                    Xóa
                                                </button> --}}
                                                <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($tags->onFirstPage())
                    <li class="page-item disabled"><a class="page-link disabled"
                            href="{{ $tags->previousPageUrl() }}">Previous</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $tags->previousPageUrl() }}">Previous</a></li>
                @endif
                @foreach ($tags as $page => $url)
                    @if ($page == $tags->currentPage())
                        <span class="current">{{ $page }}</span>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
                @if ($tags->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $tags->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><a class="page-link disabled" href="{{ $tags->nextPageUrl() }}">Next</a>
                    </li>
                @endif
            </ul>
        </nav>
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
