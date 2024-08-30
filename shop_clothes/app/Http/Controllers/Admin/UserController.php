<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\User\UserService;
use App\Utilities\Common;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $useService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function __construct(UserService $useService){
        $this->useService = $useService;
    }
    public function index(Request $request)
    {
        //
        $users = $this -> useService ->searchAndPaginate('name', $request -> get('search'));
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        if (($request->get( 'password') != null) && ($request->get( 'password_confirmation') != null)){
            if ($request->get( 'password') != $request->get(  'password_confirmation'))
            { return back()
                    ->with('notification' , 'ERROR: Confirm password does not match');
            }
        }
        $email = $request->email;
        $User = User::where('email', $email)->first();
        if ($User)
        {   return back()
            ->with('notification', 'ERROR: Email already exist');
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->get( 'password'));

        //Xu ly fire
        if ($request -> hasFile('image')) {
            $data['avatar'] = Common::uploadFile($request -> file('image'),'front/img/product-single');
        }
        $user = $this->useService->create($data);
        return redirect(  'admin/user/'. $user->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$users = $this -> useService ->all();
        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {

        $data = $request->all();
    //Xử Lý mật khẩu

    if (($request->get( 'password') != null) && ($request->get( 'password_confirmation') != null)){
        if ($request->get(  'password') != $request->get(  'password_confirmation')) {
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $data['password']= bcrypt($request->get(  'password'));
        }

        else {
        unset($data['password']);
        }



        //Xu ly anh
        if ($request->hasFile(  'image')) {
            //Thêm file mới:
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/product-single');
            //Xóa file cũ:
            $file_name_old = $request->get('image_old');
            if ($file_name_old != '') {

                unlink('front/img/product-single/' . $file_name_old);
            }
        }
        //Cap nhat du lieu
        $this -> useService -> update( $data, $user -> id);
        return redirect('admin/user/'. $user -> id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {

        $this->useService->delete($user->id);
        //Xóa file:
        $file_name = $user->avatar;
        if ($file_name = '') {

        unlink( 'front/img/product-single/' . $file_name);
        }
        return redirect( 'admin/user');
    }
}
