@extends('admin.main')

@section('content')
<?php
    $prefix     = 'order';
    $name_model = 'đơn hàng';
    $link_image = url("uploads/admin/{$prefix}");
?>
    
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Order List</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách {{$name_model}}</h1>
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        <form action="admin/{{$prefix}}/list" method="GET">
            <div class="row">
                <div class="col-sm-1">
                    <input class="form-control "  name="id" value="{{ $request->id }}" type="text" placeholder="Mã đơn hàng">
                </div>
                <div class="col-sm-2">
                    <input class="form-control"  name="name" value="{{ $request->name }}" type="text" placeholder="Tên khách hàng">
                    
                </div>
                <div class="col-sm-2">
                    <select class="form-control"  name="status" value="">
                        <option value="" <?= $request->status == ''  ? 'selected' : '' ?> >Trạng thái</option>
                        <option value="null" <?= $request->status == 'null' ? 'selected' : '' ?> >Đã nhận</option>
                        <option value="1" <?= $request->status == 1  ? 'selected' : '' ?>>Đã giao</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button type="submit"  class="btn-success btn-sm" id="ex3" >Tìm kiếm</button>
                </div>
            </div>
        </form>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Số lượng đơn</th>
                                <th scope="col">Địa chỉ giao hàng</th>
                                <th scope="col">Ngày nhận</th>
                                <th scope="col">Ngày giao</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list_order as $obj)
                                <tr>
                                
                                    <td>{{$obj->id}}</td>
                                    <td>{{$obj->name}}</td>
                                    <td>{{$obj->email}}</td>
                                    <td>{{$obj->phone}}</td>
                                    <td>{{$obj->so_luong}}</td>
                                    <td>{{$obj->address}}</td>
                                    <td>{{$obj->order_date}}</td>
                                    <td>{{$obj->deliver_date}}</td>
                                    <td>{!!setStatus($obj->status,$obj->id , 'order' )!!}</td>
                                    <td>
                                        <button type="button" class="btn-info btn-sm" ><a href = "admin/{{$prefix}}/detail/{{$obj->id}}"> Xem Chi tiết</a></button>
                                    </td>
                                    
                                </tr>
                        @endforeach   
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <ul class="pagination justify-content-center" style="margin:20px 0">
                        <li>{{$list_order->links()}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection