@extends('admin.main')

@section('content')
<?php
    $prefix     = 'user';
    $name_model = 'User';
    $link_image = url("uploads/admin/{$prefix}");
?>


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">User </h2>
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
                        <label>Chọn trạng thái</label>
                    </div>                          
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="status" class="form-control">
                                <option value="1" <?=  old('status')  == '1' ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?=  old('status')  == '0' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn quyền hạn</label>
                    </div>                          
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="level" class="form-control">
                                <option value="1" <?=  old('level')  == '1' ? 'selected' : '' ?> >Member</option>
                                <option value="2" <?=  old('level')  == '2' ? 'selected' : '' ?> >Admin</option>
                            </select>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Tên</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Email</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}" >
                        </div> 
                    </div>
                </div>    
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Địa chỉ</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        </div> 
                    </div>
                </div>   
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Phone</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Username</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                        </div> 
                    </div>
                </div>  


                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Password</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập lại Password</label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="re_password" class="form-control" value="{{ old('re_password') }}">
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