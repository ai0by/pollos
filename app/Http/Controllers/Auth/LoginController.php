<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/15
 * Time: 10:11
 */

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController  extends Controller{
    public function __construct(){
    }
    public function login(){
        $logindata = $_POST;
        $userdata = $this->objectToArray(DB::table('user')->where(['username' => $logindata['username']])->first());
        if(!isset($userdata['username'])){
            return 'error';
        }
        if($this->verPass($logindata['password'],$userdata['password'],$userdata['salt'])){
            session()->put([
                'username'=>$userdata['username'],
                'group' => $userdata['usergroup'],
            ]);
            session()->save();
            return 'success';
        }
        else return 'error';
    }


    public function register(Request $request){
        $regdata = $_POST;
//        验证邮箱
        if (isset($regdata['email'])&&!empty($regdata['email'])){
            if (!filter_var($regdata['email'],FILTER_VALIDATE_EMAIL)){
                return "邮箱格式不正确!";
            }
            $email = $this->objectToArray(DB::table('user')->where(['email' => $regdata['email']])->select('email')->first());
            if(!empty($email)) return "该邮箱已经注册过!";

        }else return "请填写邮箱!";
//        验证用户名
        if (isset($regdata['username'])&&!empty($regdata['username'])){
            if (mb_strlen($regdata['username'])<5||mb_strlen($regdata['username'])>16) return "用户名由5-16位数字或字母、汉字、下划线组成!";
            if (!preg_match('/^[A-Za-z0-9_\x{4e00}-\x{9fa5}]+$/u',$regdata['username'])){
                return "用户名由5-16位数字或字母、汉字、下划线组成!";
            }
            $username = $this->objectToArray(DB::table('user')->where(['username' => $regdata['username']])->select('username')->first());
            if (!empty($username)) return "该用户名已被注册!";
        }else return "请填写用户名!";
//        验证用户组
        if (isset($regdata['group'])&&!empty($regdata['group'])){
            $groupArr = array('1','2','3');
            if(!in_array($regdata['group'],$groupArr)) return "所选用户组不存在";
        }else return "请选择您的所在用户组!";
//        验证密码
        if (isset($regdata['password'])&&!empty($regdata['password'])){
            if (mb_strlen($regdata['password'])<6||mb_strlen($regdata['password'])>16) return "密码由6-16位数字或字母以及%@!&组成!!";
            if (!preg_match('/^[A-Za-z0-9%@!&]+$/u',$regdata['password'])) return "密码由6-16位数字或字母以及%@!&组成!!";
        }else return "请输入您的密码";
        $salt = $this->getRandomString(8);
        $res = DB::table('user')->insertGetId([
            'ip' => $request->getClientIp(),
            'username' => $regdata['username'],
            'email' => $regdata['email'],
            'password' => md5(md5($regdata['password']).$salt),
            'salt' => $salt,
            'usergroup' => $regdata['group'],
            'login_ip' => $request->getClientIp(),
        ]);

        if ($res){
            return "success";
        }
    }


    public function verPass($userpass,$datapass,$salt){
        if (md5(md5($userpass).$salt) == $datapass){
            return true;
        }
        else return false;
    }

}