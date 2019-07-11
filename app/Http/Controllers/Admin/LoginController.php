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

class LoginController extends Controller{
    public function __construct(){
    }
//    登录
    public function login(){
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        return view('admin.login',[
            'siteName' => $siteName['value'],
        ]);
    }
//    注册
    public function register(){
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        return view('admin.register',[
            'siteName' => $siteName['value'],
        ]);
    }

    public function objectToArray($e)
    {
        $e = (array)$e;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)$this->objectToArray($v);
        }
        return $e;
    }
}