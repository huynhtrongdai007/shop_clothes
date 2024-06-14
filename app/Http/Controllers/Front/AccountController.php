<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;


use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
       $this->userService = $userService;
    }

    public function login()
    {
        return view('front.acc.login');
    }
    public function register()
    {
        return view('front.acc.register');
    }

    public function checkLogin (Request $request)
    {
        $credentials = [
        'email' => $request->email,
        'password' => $request->password,
        'level' => 2, //Tài khoản cấp độ khách hàng bình thường.
        ];
        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect('');
        } else {
            return back()->
                with('notification','ERROR: Email or Password invalid');
        }
    }
    public function logout()
    {
        Auth::logout();

        return back();
    }

    public function postRegister(Request $request)
    {
        if ($request->password != $request->password_confirmation)
        {
            return back()
                ->with ('notification', 'ERROR: Password does not match');
        }

            $data=[
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'avatar' => null,
                'level'=> 2,
                'description' => 'abc',
            ];

            $this-> userService-> create($data);

            return redirect('acc/login')
                ->with('notification','Registered successfully, please login');


    }
}
