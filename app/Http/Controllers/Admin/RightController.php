<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/19
 * Time: 14:52
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class RightController extends AdminController{
    function __construct(){
    }
    public function menu(){
        $userData = $this->getUserData();
        var_dump($this->getMenu($userData));
    }
    public function right($catId = '1'){
        $userData = $this->getUserData();
        $siteName = $this->getSiteName();
        $messageData = $this->getMessageData($userData['id']);
        $tending = $this->getTending($userData['id']);
        $catList = DB::table('menu')->where(['menu_cat_id' => $catId ])->select('id','menu_name','menu_cat_id','menu_url','menu_icon')->paginate(20);
        foreach ($catList as $catItem){
            if ($catItem->menu_cat_id == 1) {
                $catItem->menu_cat_name = '顶级分类';
                continue;
            }else{
                $catItem->menu_cat_name = DB::table('menu')->where(['id' => $catItem->menu_cat_id ])->select('menu_name')->first()->menu_name;
            }
        }
        return view('admin.RightView',[
            'menuList' => $catList,
            'navList' => $this->getMenu($userData),
            'siteName' => $siteName['value'],
            'username' => $userData['username'],
            'messageNum' => $messageData['messageNum'][0],
            'messageList' => $messageData['messageList'],
            'userId' => $userData['id'],
            'avatar' => $userData['avatar'],
            'is_tending' => $tending[0],
        ]);
    }
    public function addMenuView(){
        $userData = $this->getUserData();
        $siteName = $this->getSiteName();
        $messageData = $this->getMessageData($userData['id']);
        $tending = $this->getTending($userData['id']);
        $rightCatList = $this->objectToArray(DB::table('menu')->where(['menu_cat_id' => '1' ])->get()->toArray());
        return view('admin.AddMenu',[
            'rightCatList' => $rightCatList,
            'navList' => $this->getMenu($userData),
            'siteName' => $siteName['value'],
            'username' => $userData['username'],
            'messageNum' => $messageData['messageNum'][0],
            'messageList' => $messageData['messageList'],
            'userId' => $userData['id'],
            'avatar' => $userData['avatar'],
            'is_tending' => $tending[0],
        ]);
    }
    public function addRoleView(){

    }



}