<?php
namespace App\Http\Controllers\Front;



use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Customer\CustomerServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


session_start();
class AccountController extends Controller
{

    private $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
       $this->customerService = $customerService;
    }

    public function login()
    {
        return view('front.acc.login');
    }
    public function register()
    {
        return view('front.acc.register');
    }
    public function checkLogin($email, $password)
    {
        return DB::table('customers')
            ->where('email', $email)
            ->where('password', $password)
            -> first();
    }
    public function CustomerLogin (Request $request)
    {
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $result = $this -> checkLogin($email, $password);
        if($result)
        {
            Session::put('customer', $result -> id);
            Session::put('customer_name', $result -> name);
            return redirect('');

        }
       else
       {
            return redirect() ->back()-> with('notification','Login not success');

       }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('acc/login');
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
                ->with ('notification', 'ERROR: customer name empty, please typing in');
        }
        else if ($request-> email=="")
        {
            return back()
                ->with ('notification', 'ERROR: customer email empty, please typing in');
        }
        $email = $request->email;
        $customer = customer::where('email', $email)->first();
        if ($customer)
        {   return back()
                ->with('notification', 'ERROR: Email already exist');
        }
        else {
            $data=[
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> md5($request->password),
                'avatar' => null,
                'level'=> 2,
                'description' => 'abc',
            ];

            $this-> customerService-> create($data);

            return redirect('acc/login')
                ->with('notification','Registered successfully, please login');
        }



    }
}
