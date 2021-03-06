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
        <h1 class="h3 mb-2 text-gray-800">Danh sách User</h1>
        @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
        @endif
        <form action="admin/{{$prefix}}/list" method="GET">

            <div class="row">
                <div class="col-sm-1">
                    <input class="form-control "  name="id" value="{{ $request->id }}" type="text" placeholder="ID">
                </div>
                <div class="col-sm-2">
                    <input class="form-control"  name="name" value="{{ $request->name }}" type="text" placeholder="Name">
                    
                </div>
                <div class="col-sm-2">
                    <select class="form-control"  name="status" value="">
                        <option value=''   <?= $request->status == ''  ? 'selected' : '' ?> >All Status</option>
                        <option value='null' <?= $request->status == 'null' ? 'selected' : '' ?> >Inactive</option>
                        <option value='1'   <?= $request->status == 1  ? 'selected' : '' ?> >Active</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button type="submit"  class="btn-success btn-sm" id="ex3" >Tìm kiếm</button>
                </div>
                <div class="col-sm-1">
                    <button    class="btn-success btn-sm" id="ex3" ><a href="admin/{{$prefix}}/create"> Thêm mới </a></button>
                </div>
            </div>
        </form>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                <form action="admin/{{$prefix}}/deletes" method="post">
                    @csrf
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Mã User</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Level</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng Thái</th>
                                
                                <th scope="col">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list_user as $obj)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{ $obj->id}}" ></td>
                                    <th scope="row">{{ $obj->id}}</th>
                                    
                                    <td>{{ $obj->name}}</td>
                                    <td><p><img src="{{$link_image}}/{{$obj->image}}" width="50" height="50"></p></td>
                                    <td>{{ $obj->email}}</td>
                                    <td>{{ $obj->address}}</td>
                                    <td>{!!setLevel($obj->level,$obj->id , 'user' )!!}</td>
                                    <td>{{ date("d/m/Y H:iA ", $obj->created)}}</td>                                    
                                    <td>
                                        {!!setStatus($obj->status,$obj->id , 'user' )!!}
                                    </td>

                                    <td>
                                        <button type="button" class="btn-info btn-sm" ><a href = "admin/{{$prefix}}/delete/{{$obj->id}}"> Xoá</a></button>
                                        <button type="button" class="btn-info btn-sm" ><a href = "admin/{{$prefix}}/edit/{{$obj->id}}"> Sửa</a></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <input type="submit" name="submit-multi-id" class="btn-danger btn-sm" value="Xóa">
                    </div>
                </form>
                </div>
                <div class="row">
                    <ul class="pagination justify-content-center" style="margin:20px 0">
                        <li>{{$list_user->links()}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection