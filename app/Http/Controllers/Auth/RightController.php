<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 13:41
 */

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RightController extends Controller
{

    protected function addMenu(){
        $menuData = $_POST;
        if (!isset($menuData['menu_name'])||empty($menuData['menu_name'])) return '请填写菜单名!';
        if (!isset($menuData['menu_cat_id'])||empty($menuData['menu_cat_id'])) return '请选择正确的上级分类!';
        if (!isset($menuData['menu_url'])||empty($menuData['menu_url'])) return '请填写菜单地址!';

        $vName = DB::table('menu')->where(['menu_name'=>$menuData['menu_name']])->select('id')->first();
        if (isset($vName->id)){
            return '该菜单名已存在';
        }
        if($menuData['menu_cat_id'] != 1){
            $vCat = DB::table('menu')->where(['id'=>$menuData['menu_cat_id']])->select('id','menu_cat_id')->first();
            if (!isset($vCat->id)){
                return '该父级分类不存在';
            }elseif($vCat->menu_cat_id != 1){
                return '该分类非一级分类';
            }
        }
        if (substr($menuData['menu_url'],-1,1) == '/'){
            $menuData['menu_url'] =substr($menuData['menu_url'],0,strlen($menuData['menu_url'])-1);
        }
        $vUrl = DB::table('menu')->where(['menu_url'=>$menuData['menu_url']])->select('id')->first();
        if (isset($vUrl->id)) return '菜单地址重复，请重新填写';

        $menuId = DB::table('menu')->insertGetId([
            'menu_name' => $menuData['menu_name'],
            'menu_cat_id' => $menuData['menu_cat_id'],
            'menu_url' => $menuData['menu_url'],
        ]);
        if ($menuId) return 'success';
    }

    protected function addRole(){

    }
}