

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Category Product </h2>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa</h1>
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

        <form action="<?= BASE_PATH . 'index.php?controller=category_product&action=edit&id='. $this->item->id ?>" method="POST" enctype="multipart/form-data">
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
                        <label>Nhập tên sản phẩm</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" value="<?= $this->item->name ?>" class="form-control">
                        </div> 
                    </div>
                </div>
 
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập detail</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <textarea name="detail" value="<?= $this->item->detail ?>" class="form-control" rows="5" id="comment"><?= $this->item->detail ?></textarea>
                        </div> 
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label>Chọn hình</label>
                    </div>
                    <div class="col-sm-3">
                        <div class="col-sm-2">
                            <img src="<?= BASE_PATH . 'uploads/' . $this->item->image?>" width="50" height="50"  alt="<?= $this->item->image ?>">
                            <input type="file" name="image">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" name="submit" class="btn-info btn-lg">Lưu</button>
                        <button class="btn-info btn-lg" ><a href='<?= BASE_PATH ?>index.php?controller=category_product&action=index' >Hủy bỏ</a></button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
</div>
            