<?php
namespace App\Http\Controllers\Front;



use App\Models\User;
use app\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


//session_start();
class AccountController extends Controller
{

    private $UserService;
    public function __construct(UserServiceInterface $UserService)
    {
       $this->UserService = $UserService;
    }

    public function login()
    {
        return view('front.acc.login');
    }
    public function register()
    {
        return view('front.acc.register');
    }
    public function checkLogin(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client, //Tài khoản cấp độ khách hàng bình thường.
        ];
        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect() -> intended('');
        } else {
            return back()->
            with('notification','ERROR: Email or Password invalid');
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/acc/login');
    }




    public function postRegister(Request $request)
    {

        if ($request->password != "" && $request->password_confirmation !="" && $request->password != $request->password_confirmation)
        {
            return back()
                ->with ('notification', 'ERROR: Password does not match');
        }
        else if ($request->password =="")
        {
            return back()
                ->with ('notification', 'ERROR: Password empty, please typing in');
        }
        else if ($request->password_confirmation =="")
        {
            return back()
                ->with ('notification', 'ERROR: Confirm password empty, please typing in');
        }
        else if ($request->name =="" )
        {
            return back()
                ->with ('notification', 'ERROR: User name empty, please typing in');
        }
        else if ($request-> email=="")
        {
            return back()
                ->with ('notification', 'ERROR: User email empty, please typing in');
        }
        $email = $request->email;
        $User = User::where('email', $email)->first();
        if ($User)
        {   return back()
                ->with('notification', 'ERROR: Email already exist');
        }
        else {
            $data=[
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'level'=> 2,
                'description' => 'abc',
            ];

            $this-> UserService-> create($data);

            return redirect('acc/login')
                ->with('notification','Registered successfully, please login');
        }



    }
}
