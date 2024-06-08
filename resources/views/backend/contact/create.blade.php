@extends('layouts.admin')
@section('title', 'Thêm bài viết')
@section('content')
    <form action="{{ route('admin.contact.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Thêm mới liên hệ</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="index.php?option=user" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                    <button class="btn btn-sm btn-success" name="create">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm liên hệ
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Họ tên (*)</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user_id">Tên người dùng</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="0">None</option>
                                    {!! $user_id !!}
                                </select>
                            <div class="mb-3">
                                <label>Điện thoại</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tiêu đề</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Lặp lại </label>
                                <input type="text" name="replay_id" id="replay_id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nội dung</label>
                                <input type="text" name="content" id="content" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </div>
    </section>
    </form>
@endsection
