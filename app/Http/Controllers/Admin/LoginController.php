<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/9
 * Time: 10:40
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\HeaderBag;

class LoginController extends Controller{
    public function __construct(){
    }
//    登录
    public function login(){
        if (Session::has('username')) exit('<script>location.href="/indexone"</script>');
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        return view('admin.Login',[
            'siteName' => $siteName['value'],
        ]);
    }
//    注册
    public function register(){
        if (Session::has('username')) exit('<script>location.href="/indexone"</script>');
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        return view('admin.Register',[
            'siteName' => $siteName['value'],
        ]);
    }
}