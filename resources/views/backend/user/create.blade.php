@extends('layouts.admin')
@section('title', 'Them thanhf vien ')
@section('content')
    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Thêm mới thành viên</h1>
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
                        Thêm thành viên
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Họ tên (*)</label>
                                <input type="text" name="name" class="form-control">
                                @error('delivery_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Điện thoại</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Giới tính </label>
                                <select name="gender" class="form-control">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Quyền truy cập </label>
                                <select name="roles" class="form-control">
                                    <option value="admin">Quản trị </option>
                                    <option value="customer">Người dùng</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tên đăng nhập</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Địa chỉ</label>

                                <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
