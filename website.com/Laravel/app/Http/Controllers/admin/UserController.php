<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;



class UserController extends Controller
{
    
    private $prefix = 'user';
    private $name   = 'User';

    public function list(Request $request){

        //Tim kiem theo id,name,status
        $list_user = DB::table('user')                        
                        ->select('user.*');

        $id = $request->input('id');
        $name = $request->input('name');
        $status = $request->input('status');
        $params = [];

        if($id){
            $params[] = ['id','=',$id];
        }
        if($name){
            $params[] = ['name','LIKE','%'.$name.'%'];
        }
        if($status){
            $params[] = ['status','=',$status];
        }

        $list_user = $list_user->where($params)->paginate(10);
        
        return view("admin.$this->prefix.list", compact('list_user','request'));
    }

    public function getcreate(){

        $list_user = DB::table('user')->get();
  
        return view("admin.$this->prefix.create", compact('list_user'));
    }


    public function postcreate(Request $request){

        $this->validate($request,
            [
                'name'                  => 'required|unique:user,name',
                'email'                 => 'required|email',
                'username'              => 'required|unique:user,name|min:3',
                'password'              => 'required',
                're_password'           => 'required|same:password',
                'image'                 => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            [
                'name.required'         => "Bạn chưa nhập tên ",
                'name.unique'           => "Tên {$this->name} đã tồn tại",
                'email.required'        => "Email không được rỗng",
                'email.email'           => "Email chưa đúng",
                'username.required'     => "Username không được rỗng",
                'username.unique'       => "Username đã tồn tại",
                'username.min'          => "Username ít nhất 3 ký tự",
                'password.required'     => "Password không được rỗng",
                're_password.required'  => "Nhập lại password không được rỗng",
                're_password.same'      => "Nhập lại password không trùng khớp",
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
        $items = new User;
        $items->status      = $request->status;
        $items->level       = $request->level;
        $items->name        = $request->name;
        $items->image       = $image_name;
        $items->email       = $request->email;
        $items->address     = $request->address;
        $items->phone       = $request->phone;
        $items->username    = $request->username;
        $items->password    = Hash::make($request->password);
        $items->created     = time();
        $items->save();

        return redirect("admin/{$this->prefix}/list")->with('message', "Thêm {$this->name} thành công");
    }

    public function getedit($id){


        $item = User::find($id);
        if(!$item) {
            return redirect("admin/{$this->prefix}/list")->with('message', "Không tồn tại {$this->name} này");
        }
        return view("admin.$this->prefix.edit", compact('item','list_category'));
    }

    public function postedit(Request $request,$id){

        $this->validate($request,
            [
                'email'                 => 'required|email',
                'password'              => 'required',
                're_password'           => 'required|same:password',
                'image'                 => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],

            [
                'email.required'        => "Email không được rỗng",
                'email.email'           => "Email chưa đúng",
                'password.required'     => "Password không được rỗng",
                're_password.required'  => "Nhập lại password không được rỗng",
                're_password.same'      => "Nhập lại password không trùng khớp",
            ]
        );

        $item = User::find($id);
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
        if(is_file($old_image)){
            unlink($old_image);
        }
            
        //update
        $item->status      = $request->status;
        $item->level       = $request->level;
        $item->name        = $request->name;
        $item->image       = $image_name;
        $item->email       = $request->email;
        $item->address     = $request->address;
        $item->phone       = $request->phone;
        $item->password    = Hash::make($request->password);
        $item->created     = time();
        $item->save();

        return redirect("admin/{$this->prefix}/list")->with('message', "Đã sửa {$this->name} thành công");
    }


    public function delete($id)
    {  
        
        $item = User::find($id);

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
            $delitem = User::whereIn('id',$delids)->delete();
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
    {   
        $message = '';   

        $item = User::find($id);
        
        if($item) {
            $item->status = $curent_status == 1 ? 0 : 1;
            $item->save();
            $message = "Cập nhật status thành công";
        }else {
            $message = "Status không tồn tại";
        }
        return redirect("admin/{$this->prefix}/list")->with('message', $message);
    }

    public function levels($curent_level, $id)
    {   
        $message = '';   

        $item = User::find($id);
        
        if($item) {
            $item->level = $curent_level == 1 ? 2 : 1;
            $item->save();
            $message = "Cập nhật level thành công";
        }else {
            $message = "Level không tồn tại";
        }
        return redirect("admin/{$this->prefix}/list")->with('message', $message);
    }
    public function getloginAdmin()
    {   
        return view("admin.login");
    }

    public function postloginAdmin(Request $request){   
        
        $this->validate($request,
            [
                'username'              => 'required',
                'password'              => 'required|min:3|max:32',
            ],
            [
                'username.required'     => "username không được rỗng",
                'password.required'     => "Password không được rỗng",
                'password.min'          => "Password ít nhất 3 ký tự",
                'password.max'          => "Password nhiều nhất 32 ký tự",
            ]
        );

        // $user = User::find(69);
        // Auth::login($user);
        // return View('admin/product/list',['user'=>Auth::user()]);


        if(Auth::attempt(['username' => $request->username,'password' => $request->password]))
        {
            return redirect('admin/product/list');
        }
        else
        {
            return redirect('admin/login')->with('message', 'Đăng nhập không thành công');
        }
   
    }

    public function getlogoutAdmin(){ 
        Auth::logout();
        return redirect('admin/login');
    }
}