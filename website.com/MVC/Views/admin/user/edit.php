

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">User </h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa User</h1>
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

        <form action="<?= BASE_PATH . 'index.php?module=admin&controller=user&action=edit&id='. $this->item->id ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn trạng thái</label>
                    </div>                          
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="status" class="form-control">
                                <option disabled >Chosse Status</option>
                                <option value="1" >Available</option>
                                <option value="0">Invailable</option>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn Quyền hạn</label>
                    </div>                          
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <select name="level" class="form-control">
                                <option disabled >Chosse Level</option>
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
                            <input type="text" name="name" value="<?= $this->item->name ?>" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Email</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="email" value="<?= $this->item->email ?>" class="form-control">
                        </div> 
                    </div>
                </div>    
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Address</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="address" value="<?= $this->item->address ?>" class="form-control">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Phone</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="phone" value="<?= $this->item->phone ?>" class="form-control">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Password cũ</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="password_old"  class="form-control">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập Password mới</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="password"  class="form-control">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập lại Password mới</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="re_password"  class="form-control">
                        </div> 
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-2">
                        <label>Chọn hình</label>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group input-group-sm mb-3">
                            <img src="<?= BASE_PATH . 'uploads/' . $this->item->image?>" width="50" height="50"  alt="<?= $this->item->image ; ?>"><label for="image"><?= $this->item->image ?></label>
                            <input type="file" name="image">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" name="submit" class="btn-info btn-lg">Lưu</button>
                        <button class="btn-info btn-lg" ><a href='<?= BASE_PATH ?>index.php?module=admin&controller=user&action=index' >Hủy bỏ</a></button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
</div>
            