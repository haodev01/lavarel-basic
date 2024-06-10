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
    <form class="row" id="sortForm" action="{{ route('tags.index') }}" method="GET">
        <div class="col-6">
            <select id="sortSelect" name="sort" class="form-control" onchange="this.form.submit()">
                <option value="created_at_desc" {{request('sort') ==='created_at_desc' ? 'selected' : ''}}>Sort by Date (Newest first)</option>
                <option value="created_at_asc" {{request('sort') ==='created_at_asc' ? 'selected' : ''}}>Sort by Date (Oldest first)</option>
                <option value="name_asc" {{request('sort') ==='name_asc' ? 'selected' : ''}}>Sort by Name (A-Z)</option>
                <option value="name_desc" {{request('sort' )==='name_desc' ? 'selected' : ''}}>Sort by Name (Z-A)</option>

                <!-- Thêm các lựa chọn khác nếu cần -->
            </select>


        </div>
        <div class="col-6">
            <div class="form-group">
                <div class="input-group">
                    <input value="{{request('keyword')}}" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    {{$tags->withQueryString()->links('pagination::bootstrap-5')}}
</div>
<script>
    document.getElementById('sortSelect').addEventListener('change', function() {
        document.getElementById('sortForm').submit();
    });
</script>

@endsection