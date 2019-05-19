<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AuthController extends Controller
{
    private $data = [];

    public function __construct()
    {

    }

    public function index() {
        echo "hello";
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        if(Auth::check()){
            return redirect()->route('index');
        }else{
            return view('admin/auth/login',$this->data);
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|max:255',
            'password' => 'required|max:30|min:8'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('list_product');
        }else{
            return redirect()->back()->withErrors(['message_login_failed' => 'Sai email hoặc mật khẩu']);
        }
    }

    public function getEditPassword($id){
        $this->data['id'] = $id;
        return view('admin/auth/editPassword',$this->data);
    }

    public function postEditPassword(Request $request, $id){
        $modelUser = new User();
        $request->validate([
            'oldPassword'      => 'required|max:30',
            'password'         => 'required|max:30|min8',
            'confirm_password' => 'required|same:password|max:30|min:8',
        ]);

        $input = $request->all();

        $user = $modelUser->getUserById($id);
        if(!$user){
            return abort(404);
        }

        $result = $modelUser->updateUserPassword($user, $input);
        if($result == TRUE) {
            $request->session()->flash('message_success', 'Cập nhật mật khẩu thành công');
            return redirect()->route('index');
        }
        else{
            return redirect()->back()->withErrors(['oldPassword' => 'Mật khẩu cũ không đúng']);
        }

    }
}