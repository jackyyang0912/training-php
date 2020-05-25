@extends('admin.main')

@section('content')
<?php
    $prefix     = 'category';
    $name_model = 'danh mục';
    $link_image = url("uploads/admin/{$prefix}");
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Product </h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa {{$name_model}}: {{$item->name}}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="admin/{{$prefix}}/edit/{{$item->id}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <label>Sửa tên {{$name_model}}</label>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" value="{{ old('name',$item->name) }}" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Sửa trạng thái</label>
                    </div>                          
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="status" class="form-control">

                                <option value="" disabled>--Chosse Status--</option>
                                <option value="0" <?=  old('status',$item->status)  == 0 ? 'selected' : '' ?>>Inactive</option>
                                <option value="1" <?=  old('status',$item->status)  == 1 ? 'selected' : '' ?>>Active</option>
                            </select>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Deription</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <textarea name="decription"  class="form-control" rows="10" id="comment">{{ old('decription',$item->decription) }}</textarea>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập detail</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <textarea name="detail" class="form-control" rows="10" id="comment">{{ old('detail',$item->detail) }}</textarea>
                        </div> 
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label>Chọn hình</label>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <img src="{{$link_image}}/{{$item->image}}" width="50" height="50"  alt=""><label for="image"></label>
                            <input type="file" name="image">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" name="submit" class="btn-info btn-lg">Lưu</button>
                        <button class="btn-info btn-lg" ><a href="admin/{{$prefix}}/list">Hủy bỏ</a></button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
</div>
@endsection