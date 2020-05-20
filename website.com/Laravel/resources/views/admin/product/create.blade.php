@extends('admin.main')

@section('content')
<?php
    $prefix     = 'product';
    $name_model = 'sản phẩm';
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
    <h1 class="h3 mb-2 text-gray-800">Thêm mới</h1>
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

        <form action="admin/{{$prefix}}/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn danh mục</label>
                    </div>    
                            
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="category_id" class="form-control">
                                @foreach($list_category as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div> 
                    </div>
                </div>

                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn trạng thái</label>
                    </div>                          
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="status" class="form-control">
                                <option disabled >Chosse Status</option>
                                <option value="1">Invailable</option>
                                <option value="2">Available</option>
                            </select>
                        </div> 
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập tên sản phẩm </label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" class="form-control" value="">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập giá</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="price" class="form-control">
                        </div> 
                    </div>
                </div>    
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập decription</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <textarea name="decription" class="form-control" rows="5" id="comment" ></textarea>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập detail</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <textarea name="detail" class="form-control" rows="5" id="comment"></textarea>
                        </div> 
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label>Chọn hình</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="file" name="image">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" name="submit" class="btn-info btn-lg">Lưu</button>
                        <button class="btn-info btn-lg" ><a href="admin/{{$prefix}}/list" >Hủy bỏ</a></button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
</div>
@endsection