

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
                                
                        <?php
                            if($this->errors) { 
                        ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php
                                        foreach($this->errors as $vl) {
                                            echo '<li>'.$vl.'</li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        <?php
                            }
                        ?>
                            <form action="<?= BASE_PATH . 'index.php?controller=product&action=add' ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">


                                    <div class="row">     
                                        <div class="col-sm-2">
                                            <label>Chọn trạng thái</label>
                                        </div>                          
                                        <div class="col-sm-2">
                                            <div class="input-group input-group-sm mb-3">
                                                <select name="status" class="form-control">
                                                    <option value="1" >Available</option>
                                                    <option value="0">Invailable</option>
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
                                                    <option value="1" >Member</option>
                                                    <option value="2">Admin</option>
                                                </select>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập Tên</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="name" class="form-control">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập Email</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="email" class="form-control">
                                            </div> 
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập Địa chỉ</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="address" class="form-control">
                                            </div> 
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập Phone</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="phone" class="form-control">
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập Username</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="username" class="form-control">
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập Password</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="password" class="form-control">
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label>Nhập lại Password</label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" name="re_password" class="form-control">
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
                                            <button class="btn-info btn-lg" ><a href='<?= BASE_PATH ?>index.php?controller=product&action=index' >Hủy bỏ</a></button>
                                        </div>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                