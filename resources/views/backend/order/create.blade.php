@extends('layouts.admin')
@section('title', 'Them down hang ')
@section('content')
    <form action="{{ route('admin.order.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm Don hang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" name="create" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Lưu
                            </button>
                            <a class="btn btn-sm btn-info" href="product_index.html">
                                <i class="fa fa-arrow-left"></i> Về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="delivery_name">Tên khách hàng</label>
                                <input type="text" value="" name="delivery_name" id="delivery_name"
                                    class="form-control">
                                @error('delivery_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user_id">Tài khoản đặt hàng</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="0">None</option>
                                    {!! $list_user !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="delivery_email">Email</label>
                                <input type="text" value="" name="delivery_email" id="delivery_email"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="delivery_phone">Phone</label>
                                <input type="text" value="" name="delivery_phone" id="delivery_phone"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="delivery_address">Địa chỉ</label>
                                <textarea name="delivery_address" id="delivery_address" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="note">Ghi chú</label>
                                <textarea name="note" id="note" class="form-control"></textarea>
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
            </div>
            </div>
        </section>
    </form>
@endsection
