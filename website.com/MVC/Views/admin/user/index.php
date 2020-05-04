
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
        <form action="<?= BASE_PATH . 'index.php?module=admin&controller=user&action=index' ?>" method="GET">
                <input type="hidden" name="module" value="admin">
                <input type="hidden" name="controller" value="user">
                <input type="hidden" name="action" value="index">
            <div class="row">
                <div class="col-sm-1">
                    <input class="form-control "  name="id" value="<?= $this->id ?>" type="text" placeholder="ID">
                </div>
                <div class="col-sm-2">
                    <input class="form-control"  name="name" value="<?= $this->name ?>" type="text" placeholder="Name">
                    
                </div>
                <div class="col-sm-1">
                    <button type="submit"  class="btn-success btn-sm" id="ex3" >Tìm kiếm</button>
                </div>
                <div class="col-sm-1">
                    <button    class="btn-success btn-sm" id="ex3" ><a href='<?=BASE_PATH ?>index.php?module=admin&controller=user&action=add'> Thêm mới </a></button>
                </div>
            </div>
        </form>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                <form action="<?=BASE_PATH . 'index.php?module=admin&controller=user&action=delete'?>" method="POST">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->data){
                                foreach($this->data as $key => $obj) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?php echo $obj->id; ?>" ></td>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    
                                    <td><?= $obj->name ?></td>
                                    <td><?= $obj->email ?></td>
                                    <td><?= $obj->address ?></td>
                                    <td><?= date("d/m/Y H:iA ", $obj->created) ?></td>                                    
                                    <td>
                                        <?php 
                                        $url_status = BASE_PATH . 'index.php?module=admin&controller=user&action=changeStatus&status=' . $obj->status . '&id=' . $obj->id;
                                        $url_delete = BASE_PATH . 'index.php?module=admin&controller=user&action=delete'.'&id=' . $obj->id . '&image=' . $obj->image ;
                                        $url_edit   = BASE_PATH . 'index.php?module=admin&controller=user&action=edit'.'&id=' . $obj->id ;
                                        ?>
                                        <?= Helper::setStatus($obj->status, $url_status , 'user') ?>
                                    </td>

                                    <td>
                                        <button type="button" class="btn-info btn-sm" ><a href = '<?= $url_delete ?>'> Xoá</a></button>
                                        <button type="button" class="btn-info btn-sm" ><a href = '<?= $url_edit ?>'> Sửa</a></button>
                                    </td>
                                </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                    <div>
                        <input type="submit" name="submit-multi-id" class="btn-danger btn-sm" value="Xóa">
                    </div>
                </form>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            </li>
                            <?php 
                                if(isset($this->totalPage) ){
                                    for($i = 1 ; $i <= $this->totalPage ; $i++ ) { 
                                        $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index' . $this->url_search . '&page=' . $i ;
                                        $classActive = $this->currentPage == $i ? 'active' : '';
                            ?>
                                <li class="page-item <?= $classActive ?>" ><a class="page-link" href='<?= $url ;?>'> <?= $i ;?> </a></li>
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
