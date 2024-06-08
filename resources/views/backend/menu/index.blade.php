@extends('layouts.admin')
@section('title', 'Quản lý Menu')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý menu</li>
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
                        <a class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</a>
                        <a class="btn btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="accordion" id="accordionExample">
                                <div class="card mb-0 p-3">
                                    <select name="position" class="form-control">
                                        <option value="mainmenu">Main Menu</option>
                                        <option value="footermenu">Footer Menu</option>
                                        <option value="rightmenu">Right Menu</option>
                                    </select>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingCategory">
                                        <strong data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true"
                                            aria-controls="collapseCategory">
                                            Danh mục sản phẩm
                                        </strong>
                                    </div>
                                    <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                        data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_category as $category): ?>
                                            <div class="form-check">
                                                <input name="CategoryId[]" class="form-check-input" type="checkbox"
                                                    value="{{ $category->id }}" id="CategoryId{{ $category->id }}">
                                                <label class="form-check-label" for="CategoryId{{ $category->id }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                            <?php endforeach ;?>
                                            <div class="my-3">
                                                <button type="submit" name="ADDCATEGORY"
                                                    class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingBrand">
                                        <strong data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true"
                                            aria-controls="collapseBrand">
                                            Thương hiệu
                                        </strong>
                                    </div>
                                    <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                        data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_brand as $brand) :?>
                                            <div class="form-check">
                                                <input name="BrandId[]" class="form-check-input" type="checkbox"
                                                    value="{{ $brand->id }}" id="BrandId{{ $brand->id }}">
                                                <label class="form-check-label" for="BrandId{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </label>
                                            </div>
                                            <?php endforeach;?>
                                            <div class="my-3">
                                                <button type="submit" name="ADDBRAND"
                                                    class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingTopic">
                                        <strong data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true"
                                            aria-controls="collapseTopic">
                                            Chủ đề bài viết
                                        </strong>
                                    </div>
                                    <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                        data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_topic as $topic): ?>
                                            <div class="form-check">
                                                <input name="TopicId[]" class="form-check-input" type="checkbox"
                                                    value="{{ $topic->id }}" id="TopicId{{ $topic->id }}">
                                                <label class="form-check-label" for="TopicId{{ $topic->id }}">
                                                    {{ $topic->name }}
                                                </label>
                                            </div>
                                            <?php endforeach;?>
                                            <div class="my-3">
                                                <button type="submit" name="ADDTOPIC"
                                                    class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingPage">
                                        <strong data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                                            aria-controls="collapsePage">
                                            Trang đơn
                                        </strong>
                                    </div>
                                    <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                        data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <?php foreach ($list_post as $post): ?>
                                            <div class="form-check">
                                                <input name="PostId[[]" class="form-check-input" type="checkbox"
                                                    value="{{ $post->id }}" id="PostId[{{ $post->id }}">
                                                <label class="form-check-label" for="PostId[{{ $post->id }}">
                                                    {{ $post->title }}
                                                </label>
                                            </div>
                                            <?php endforeach;?>
                                            <div class="my-3">
                                                <button type="submit" name="ADDPOST"
                                                    class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingCustom">
                                        <strong data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true"
                                            aria-controls="collapseCustom">
                                            Tuỳ liên kết
                                        </strong>
                                    </div>
                                    <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                        data-parent="#accordionExample">
                                        <div class="card-body p-3">
                                            <div class="mb-3">
                                                <label>Tên menu</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Liên kết</label>
                                                <input type="text" name="link" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="ADDCUSTOM"
                                                    class="btn btn-sm btn-success form-control">Thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-9">
                        <table id="product-table" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 30px">#</th>
                                    <th>Tên Menu </th>
                                    <th>Link</th>
                                    <th>Kiểu</th>
                                    <th>Chức năng</th>
                                    <th style="width: 270px">Hành động</th>
                                    <th style="width: 30px">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center"><input type="checkbox" style="width: 20px"></td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->link }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>{{ $row->position }}</td>
                                        @php
                                            $args = ['id' => $row->id];
                                        @endphp
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.banner.status', $args) }}"
                                                    class="btn btn-success"><i class="fas fa-toggle-on"></i></a>
                                            @else
                                                <a href="{{ route('admin.banner.status', $args) }}"
                                                    class="btn btn-danger"><i class="fas fa-toggle-off"></i></a>
                                            @endif
                                            <a href="{{ route('admin.banner.show', $args) }}" class="btn btn-primary"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.banner.edit', $args) }}" class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.banner.delete', $args) }}"
                                                class="btn btn-warning text-white"><i class="far fa-trash-alt"></i></a>
                                        </td>


                                        <td>{{ $row->id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
