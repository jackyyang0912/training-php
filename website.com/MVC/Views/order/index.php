
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Order List</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
        <form action="<?= BASE_PATH . 'index.php?controller=order&action=index' ?>" method="GET">
                <input type="hidden" name="controller" value="order">
                <input type="hidden" name="action" value="index">
            <div class="row">
                <div class="col-sm-1">
                    <input class="form-control "  name="id" value="<?= $this->id ?>" type="text" placeholder="ID">
                </div>
                <div class="col-sm-2">
                    <input class="form-control"  name="name" value="<?= $this->name ?>" type="text" placeholder="Name">
                    
                </div>
                <div class="col-sm-2">
                    <select class="form-control"  name="status" value="">
                        <option value=""  <?= $this->status != ''  ? 'selected' : '' ?>>Trạng thái</option>
                        <option value="1" <?= $this->status == '1' ? 'selected' : '' ?>>Đã nhận</option>
                        <option value="0" <?= $this->status == '0' ? 'selected' : '' ?>>Đã giao</option>
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
                                <th></th>
                                <th scope="col">Mã đơn</th>
                                <th scope="col">Tên</th>
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
                            <?php if($this->data){
                                foreach($this->data as $key => $obj) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?php echo $obj->id; ?>" ></td>
                                    <td><?= $obj->id ?></td>
                                    <td><?= $obj->name ?></td>
                                    <td><?= $obj->email ?></td>
                                    <td><?= $obj->phone ?></td>
                                    <td><?= $obj->so_luong ?></td>
                                    <td><?= $obj->address ?></td>
                                    <td><?= $obj->order_date ?></td>
                                    <td><?= $obj->deliver_date ?></td>
                                    <td>
                                    <?php 
                                        $url_status = BASE_PATH . 'index.php?controller=order&action=changeStatus&status=' . $obj->status . '&id=' . $obj->id ;
                                        $url_detail = BASE_PATH . 'index.php?controller=order&action=detail&id=' . $obj->id;
                                    ?>
                                    <?= Helper::setStatus($obj->status,$url_status,'order'); ?></td>
                                    <td>
                                        <button type="button" class="btn-info btn-sm" ><a href = '<?=$url_detail?>'> Xem Chi tiết</a></button>
                                    </td>
                                </tr>
                            <?php } }?>
                        </tbody>
                    </table>


                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            </li>
                            <?php 
                                if(isset($this->totalPage) ){
                                    for($i = 1 ; $i <= $this->totalPage ; $i++ ) { 
                                        $url_page = BASE_PATH . 'index.php?controller=order&action=index&page=' . $i ;
                                        $classActive = $this->currentPage == $i ? 'active' : '';
                            ?>
                                <li class="page-item <?= $classActive ?>" ><a class="page-link" href='<?= $url_page ;?>'> <?= $i ;?> </a></li>
                            <?php 
                                    }
                                } 
                            ?>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
