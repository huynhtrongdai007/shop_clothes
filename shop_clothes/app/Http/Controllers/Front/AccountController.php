<?php
namespace App\Http\Controllers\Front;



use App\Models\User;
use App\Service\Order\OrderServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;



//session_start();
class AccountController extends Controller
{

    private $UserService;
    private $orderService;
    public function __construct(UserServiceInterface $UserService,
                                OrderServiceInterface $orderService)
    {
       $this->UserService = $UserService;
       $this->orderService = $orderService;
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
                'level'=> Constant::user_level_client,
                'description' => 'abc',
            ];

            $this-> UserService-> create($data);

            return redirect('acc/login')
                ->with('notification','Registered successfully, please login');
        }



    }

    public function myOrderIndex()
    {
        $orders = $this -> orderService -> getOrderById(Auth::id());
        return view ('front.acc.my-order.index',compact('orders'));
    }
    public function myOrderShow($id)
    {
        $order = $this -> orderService -> find($id);
        return view ('front.acc.my-order.show',compact('order'));
    }
}
