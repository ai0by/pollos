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
    public function login(){
        return view('admin.login',[
            'siteName' => 'Pollos',
        ]);
    }
    public function register(){
        return view('admin.register',[
            'siteName' => 'Pollos',
        ]);
    }
}