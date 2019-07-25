<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
//    验证用户权限
    public function verLogin(){
        if (!Session::has('username')){
            exit('<script>location.href="/login"</script>');
        }
    }
//    退出登录
    public function loginOut(){
        session()->flush();
        return view('admin.Loginout');
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
//    验证用户登录，并将用户信息返回
    public function getUserData(){
        if (!Session::has('username')){
            session()->flush();
            exit('<script>location.href="/login"</script>');
        }else{
            $userData = $this->objectToArray(DB::table('user')->where(['username' => Session::get('username')])->first());
            return $userData;
        }
    }

//    取后台每次刷新的消息列表，传入用户id，应在用户验证信息后使用
    public function getMessageData($id){
        $MessageData = array();
        $MessageData['messageNum']  = $this->objectToArray(DB::table('message')->where(['userid' => $id])->count());
        $MessageData['messageList'] = $this->objectToArray(DB::table('message')->where(['userid' => $id])->get()->toArray());
        return $MessageData;
    }

//    取当前站点的名字
    public function getSiteName(){
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        return $siteName;
    }

    public function getTending($id){
        $tending = $this->objectToArray(DB::table('links')->where(['userid' => $id])->count());
        return $tending;
    }
}
