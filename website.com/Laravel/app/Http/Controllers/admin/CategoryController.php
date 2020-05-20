<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    private $prefix = 'category';
    private $name   = 'Danh mục';

    public function list(Request $request){

        (object)$request->all();

        //Tim kiem theo id,name,status
        $list_category = DB::table('category_product')                        
                        ->select('category_product.*')
                        ->when($request->id, function($query) use ($request){
                            $query->where('id', '=', $request->id);
                        })
                        ->when($request->name, function($query) use ($request){
                            $query->where('name', 'LIKE', '%'.$request->name.'%');
                        })
                        ->when($request->status, function($query) use ($request){
                            $query->where('status', '=', $request->status);
                        })
                        ->paginate(10);


        return view("admin.$this->prefix.list", compact('list_category', 'request'));
    }

    public function getcreate(){

        return view("admin.$this->prefix.create");
    }


    public function postcreate(Request $request){

        (object)$request->all();

        $this->validate($request,
            [
                'name'          => 'required|unique:category_product,name',
                'detail'        => 'required',
                'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            [
                'name.required'     => "Bạn chưa nhập tên {$this->name}",
                'name.unique'       => "Tên {$this->name} đã tồn tại",
                'detail.required'   => "Thông tin chi tiết {$this->name} không được rỗng",
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
        $items = new Category;
        $items->name         = $request->name;
        $items->status       = $request->status;
        $items->image        = $image_name;
        $items->decription   = $request->decription;
        $items->detail       = $request->detail;
        $items->created      = time();
        $items->save();

        return redirect("admin/{$this->prefix}/list")->with('message', "Thêm {$this->name} thành công");
    }

    public function getedit($id){

        $list_category = DB::table('category_product')->get();
        $item = Category::find($id);
 
        return view("admin.$this->prefix.edit", compact('item','list_category'));
    }

    public function postedit(Request $request,$id){

        $item = Category::find($id);

        $this->validate($request,
            [
                'name'          => 'required|unique:category_product,name|min:3|max:100',
                'detail'        => 'required',
                'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            [
                'name.required'     => "Bạn chưa nhập tên {$this->name}",
                'name.unique'       => "Tên {$this->name} đã tồn tại",
                'name.min'          => "Tên {$this->name} ít nhất 3 ký tự",
                'name.max'          => "Tên {$this->name} tối đa 100 ký tự",
                'detail.required'   => "Thông tin chi tiết {$this->name} không được rỗng",          
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
        //delete old file
        $old_image = $path_upload . $item->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
        //move file
        $file->move( $path_upload , $image_name);
        }

            
        
        //update
        $item->name         = $request->name;
        $item->status       = $request->status;
        $item->image        = $image_name;
        $item->decription   = $request->decription;
        $item->detail       = $request->detail;
        $item->created      = time();
        $item->save();

        return redirect("admin/{$this->prefix}/list")->with('message', "Đã sửa {$this->name} thành công");
    }


    public function delete($id)
    {  
        
        $item = Category::find($id);

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
            $delitem = Category::whereIn('id',$delids)->delete();
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
        $item = Category::find($id);

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