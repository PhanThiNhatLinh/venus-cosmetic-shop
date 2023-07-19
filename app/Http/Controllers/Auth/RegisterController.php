<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/trang-chu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->model = new User();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ],
        [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'unique' => ':attribute không được trùng lặp',
            'regex' => ':attribute phải đúng quy tắc có ít nhất 8 kí tự, có chữ viết hoa và thường, 1 số và 1 kí tự đặc biệt',
        ],
    
        [
            'name' => 'Tên Đăng Nhập',
            'password'  => 'Mật Khẩu',
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    /*
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),            
        ]);

    }
    */
    public function register(Request $request)
    {
        $params = $request->all();
        $params['thumb'] = 'user-icon-1.png'; 
        // die();
        $this->model->insertItem($params,['task'=>'register']);
        return redirect('/login')->with('success', 'Đăng kí Thành Công, Mời Đăng Nhập Tài Khoản');
    }

}
