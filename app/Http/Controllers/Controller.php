<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function objectToArray($e){
        $e = (array)$e;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)$this->objectToArray($v);
        }
        return $e;
    }

    public function getRandomString($len, $chars=null){
        if (is_null($chars)){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        mt_srand(10000000*(double)microtime());
        for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
            $str .= $chars[mt_rand(0, $lc)];
        }
        return $str;
    }
    public function verLogin(){
        if (!Session::has('username')){
            exit('<script>location.href="/login"</script>');
        }
    }

    public function loginOut(){
        session()->flush();
        return view('admin.loginout');
    }
//    获取当前用户权限菜单，配合AdminNav这个模板使用
    public function getMenu($userData){
        $user_role = $this->objectToArray(DB::table('role')->leftJoin('user_role','role.id','=','user_role.roleid')->where(['user_role.userid'=>$userData['id']])->get()->toArray())[0];
        $user_menu = $this->objectToArray(DB::table('menu')->leftJoin('menu_role','menu.id','=','menu_role.menuid')->where(['menu_role.roleid'=>$user_role['roleid']])->get()->toArray());
        $menuArr = array();
        for ($i = 0;$i<count($user_menu);$i++){
            if ($user_menu[$i]['menu_cat_id'] == 1){
                $menuArr[$i] = $user_menu[$i];
                $m = 0;
                for ($j = 0;$j<count($user_menu);$j++){
                    if ($user_menu[$j]['menu_cat_id']==$menuArr[$i]['id']){
                        $menuArr[$i][$m] = $user_menu[$j];
                        $m++;
                    }
                }
                $menuArr[$i]['size'] = $m;
            }
        }
        return $menuArr;
    }
}
