<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;
use Session;
class UserController extends Controller
{
    
    private $prefix = 'user';
    private $name   = 'User';

    public function loginsite(){

        return view("site.$this->prefix.login");
    }

    public function postloginsite(Request $request){

        $this->validate($request,
            [
                'username'              => 'required',
                'password'              => 'required',
            ],
            [
                'username.required'     => "Username không được rỗng",
                'username.min'          => "Username ít nhất 3 ký tự",
                'password.required'     => "Password không được rỗng",
            ]
        );
        $user_info = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($user_info))
        {
            return redirect('home');
        }
        else
        {
            return redirect()->back()->with(['flag' => 'danger','message' => 'Đăng nhập không thành công']);
        }

    }

    public function postlogoutsite(){

        Auth::logout();
        Session::forget('cart');
        return redirect('home');

    }


    public function register(){

        return view("site.$this->prefix.login");
    }
    
    public function postregister(Request $request){
      
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
                'image.required'        => "Hình ảnh avatar không được rỗng",
                'image.mimes'           => "Hình ảnh định dạng phải là jpeg,png,jpg,gif,svg tối đa 2048KB",
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
        $user = new User;
        $user->status      = 1;
        $user->level       = 1;
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->address     = $request->address;
        $user->phone       = $request->phone;
        $user->username    = $request->username;
        $user->password    = Hash::make($request->password);
        $user->created     = time();
        $user->image       = $image_name;
        $user->save();
        
        return redirect()->back()->with(['flag' => 'success','message' => 'Đã đăng ký tài khoản thành công']);
    }
}