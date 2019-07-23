<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 14:52
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class RightController extends Controller{
    function __construct(){
    }
    public function menu(){
        $userData = $this->objectToArray(DB::table('user')->where(['username' => Session::get('username')])->first());
        var_dump($this->getMenu($userData));
    }

    public function addMenuView(){

        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        $userData = $this->objectToArray(DB::table('user')->where(['username' => Session::get('username')])->first());
        $messageNum = $this->objectToArray(DB::table('message')->where(['userid' => $userData['id']])->count());
        $messageList = $this->objectToArray(DB::table('message')->where(['userid' => $userData['id']])->get()->toArray());
        $tending = $this->objectToArray(DB::table('links')->where(['userid' => $userData['id']])->count());
        $rightCatList = $this->objectToArray(DB::table('menu')->where(['menu_cat_id' => '1' ])->get()->toArray());
        return view('admin.addMenu',[
            'navList' => $this->getMenu($userData),
            'rightCatList' => $rightCatList,
            'siteName' => $siteName['value'],
            'username' => $userData['username'],
            'messageNum' => $messageNum[0],
            'messageList' => $messageList,
            'userId' => $userData['id'],
            'avatar' => $userData['avatar'],
            'is_tending' => $tending[0]
        ]);
    }
    public function addRoleView(){

    }



}