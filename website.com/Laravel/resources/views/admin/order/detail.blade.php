

@extends('admin.main')

@section('content')
<?php
    $prefix     = 'order';
    $name_model = 'Chi tiết đơn hàng';
    $total = 0;
?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Order Detail </h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">{{$name_model}}</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tên Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                                
                          @foreach($list_detail as $item)
                            <?php $total += ($item->price)*($item->quantity); ?>
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{formatNumber($item->price*$item->quantity)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">SUM</td>
                                <td>{{formatNumber($total)}}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div>
                        <a href = "admin/{{$prefix}}/list" class="btn-info btn-lg"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection