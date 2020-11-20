<?php

namespace App\Http\Controllers\V1\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * 登录页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('v1.layouts.login');
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        //验证数据
        $validator = Validator::make($request->post(), [
            'email' => 'required|email',
            'password' => 'required',

        ], [
            'email.required' => '用户名不能为空！',
            'email.email' => '用户名格式不正确，请输入正确的邮箱！',
            'password.required' => '密码不能为空！'
        ]);
        if ($validator->fails()) {  //如果数据有问题，就显示出错误信息
            return back()->withErrors($validator)->withInput();
        }

        $email = $request->post('email');
        $password = $request->post('password');
        //判断账号密码是否正确
       if (Auth::attempt(['email' => $email, 'password' => $password]))
       {
           if (is_null(Auth::user()->email_verified_at))
           {
               return back()->withErrors(['error' => '登陆失败，该账号未激活，请前往邮箱激活后再试！'])->withInput();
           }

           return redirect()->intended('v1_admin');
       }

       //账号密码错误
        return back()->withErrors(['error' => '登陆失败，用户名或密码错误！'])->withInput();
    }

    /**
     * 退出登录
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect('v1_login');
    }
}
