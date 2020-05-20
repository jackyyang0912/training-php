<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    private $prefix = 'product';
    private $name   = 'sản phẩm';

    public function list(Request $request){

        (object)$request->all();

        //Tim kiem theo id,name,status
        $list_product = DB::table('product')                        
                        ->leftjoin('category_product', 'product.category_id', '=', 'category_product.id')
                        ->select('product.*', 'category_product.name as cate_name')
                        ->when($request->id, function($query) use ($request){
                            $query->where('product.id', '=', $request->id);
                        })
                        ->when($request->name, function($query) use ($request){
                            $query->where('product.name', 'LIKE', '%'.$request->name.'%');
                        })
                        ->when($request->status, function($query) use ($request){
                            $query->where('product.status', '=', $request->status);
                        })
                        ->paginate(10);


        return view("admin.$this->prefix.list", compact('list_product', 'request'));
    }

    public function getcreate(){

        $list_category = DB::table('category_product')->get();
  
        return view("admin.$this->prefix.create", compact('list_category'));
    }


    public function postcreate(Request $request){

        (object)$request->all();

        $this->validate($request,
            [
                'name'          => 'required|unique:product,name',
                'price'         => 'required|numeric',
                'detail'        => 'required',
                'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            [
                'name.required'     => "Bạn chưa nhập tên {$this->name}",
                'name.unique'       => "Tên {$this->name} đã tồn tại",
                'detail.required'   => "Thông tin chi tiết {$this->name} không được rỗng",
                'price.required'    => "Thông tin giá {$this->name} không được rỗng",
                'numeric'           => "Vui lòng nhập số vào trường này",
                'image.required'    => "Vui lòng chọn ảnh đại diện",
                'image.mimes'       => "Vui lòng chọn file với đuôi mở rộng: jpeg, png, jpg, gif, svg",
                'image.max'         => "Chọn kích thước dưới 2MB"
            ]
        );


        //upload file
        $image_name = '';
        //Kiểm tra file
        if ($request->hasFile('image')) {
        $path_upload    = "./uploads/admin/{$this->prefix}";
        $file           = $request->image;
        $image_name     = time() . '-' . $file->getClientOriginalName();
        //move file
        $file->move( $path_upload , $image_name);
        }
        //save
        $items = new Product;
        $items->name         = $request->name;
        $items->category_id  = $request->category_id;
        $items->status       = $request->status;
        $items->price        = $request->price;
        $items->image        = $image_name;
        $items->decription   = $request->decription;
        $items->detail       = $request->detail;
        $items->created      = time();
        $items->save();

        return redirect("admin/{$this->prefix}/list")->with('message', "Thêm {$this->name} thành công");
    }

    public function getedit($id){

        $list_category = DB::table('category_product')->get();
        $item = Product::find($id);
 
        return view("admin.$this->prefix.edit", compact('item','list_category'));
    }

    public function postedit(Request $request,$id){

        $item = Product::find($id);

        
      
        $this->validate($request,
            [
                'name'          => 'required|unique:product,name|min:3|max:100',
                'price'         => 'required|numeric',
                'detail'        => 'required',
                'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            [
                'name.required'     => "Bạn chưa nhập tên {$this->name}",
                'name.unique'       => "Tên {$this->name} đã tồn tại",
                'name.min'          => "Tên {$this->name} ít nhất 3 ký tự",
                'name.max'          => "Tên {$this->name} tối đa 100 ký tự",
                'detail.required'   => "Thông tin chi tiết {$this->name} không được rỗng",
                'price.required'    => "Thông tin giá {$this->name} không được rỗng",
                'numeric'           => "Vui lòng nhập số vào trường này",
                
                'image.required'    => "Vui lòng chọn ảnh đại diện",
                'image.mimes'       => "Vui lòng chọn file với đuôi mở rộng: jpeg, png, jpg, gif, svg",
                'image.max'         => "Chọn kích thước dưới 2MB"
            ]
        );


        //upload file
        $image_name = '';
        //Kiểm tra file
        if ($request->hasFile('image')) {
        $path_upload    = "./uploads/admin/{$this->prefix}/";
        $file           = $request->image;
        $image_name     = time() . '-' . $file->getClientOriginalName();
        //move file
        $file->move( $path_upload , $image_name);
        }
        //delete old file
        $old_image = $path_upload . $item->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
            
        
        //update
        $item->name         = $request->name;
        $item->category_id  = $request->category_id;
        $item->status       = $request->status;
        $item->price        = $request->price;
        $item->image        = $image_name;
        $item->decription   = $request->decription;
        $item->detail       = $request->detail;
        $item->created      = time();
        $item->save();

        return redirect("admin/{$this->prefix}/list")->with('message', "Đã sửa {$this->name} thành công");
    }


    public function delete($id)
    {  
        
        $item = Product::find($id);

        $message = '';
        if($item->delete()) { 
            $message = "Xóa {$this->name} thành công";
        }else {
            $message = "Xóa {$this->name} thất bại";
        }

        return redirect("admin/{$this->prefix}/list")->with('message', $message);
    }

    public function deletes(Request $request) {
        $delids = $request->input('ids');
        if($delids){
            $delitem = Product::whereIn('id',$delids)->delete();
            if($delitem){
                $count = count($delids);
                $message = "Xóa thành công {$count} {$this->name}";
            }else{
                $message = "{$this->name} xóa không thành công";
            }
        }else{
            $message = "Vui lòng chọn {$this->name} để xóa";
        }
        return redirect("admin/{$this->prefix}/list")->with('message', $message);
    }

    public function status($curent_status, $id)
    {   $message = '';    
        $item = Product::find($id);
        if($item) {
            $item->status = $curent_status == 1 ? 2 : 1;
            $item->save();
            $message = "Cập nhật status thành công";
        }else {
            $message = "Status không tồn tại";
        }
        return redirect("admin/{$this->prefix}/list")->with('message', $message);
    }
}