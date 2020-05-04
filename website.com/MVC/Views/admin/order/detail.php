
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Order Detail </h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Chi tiết đơn đặt hàng</h1>
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
                            <?php 
                                $total = 0;
                                if($this->data){
                                    foreach($this->data as $key => $obj) { 
                                        $total += $obj->price*$obj->quantity;
                            ?>
                                <tr>
                                
                                    <td><?= $obj->name ?></td>
                                    <td><?= Helper::formatNumber($obj->price) ?></td>
                                    <td><?= $obj->quantity ?></td>
                                    <td><?= Helper::formatNumber($obj->price*$obj->quantity) ?></td>
                                </tr>
                            <?php } }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">SUM</td>
                                <td><?= Helper::formatNumber($total) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div>
                        <?php $url_back = BASE_PATH .'index.php?module=admin&controller=order&action=index'?>
                        <a href = '<?=$url_back?>' class="btn-info btn-lg"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
